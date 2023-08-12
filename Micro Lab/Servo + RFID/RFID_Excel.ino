#include <SPI.h>
#include <MFRC522.h>

#define SS_PIN 53 
#define RST_PIN 5

MFRC522 mfrc522(SS_PIN, RST_PIN); // Create MFRC522 instance.

byte Name1[5] = {0xD3, 0x46, 0x14, 0x0A}; // Tushar UID card
byte Name2[5] = {0x43, 0x9E, 0x5D, 0x97}; // Lrk UID card

void setup() {
  Serial.begin(9600);
  SPI.begin(); // Initiate  SPI bus
  mfrc522.PCD_Init(); // Initiate MFRC522
  Serial.println("Put your card near the Scanner...");
  Serial.println();
}

void loop() {
  // Look for new cards
  if ( ! mfrc522.PICC_IsNewCardPresent()) {
    return;
  }

  // Select one of the cards
  if ( ! mfrc522.PICC_ReadCardSerial()) {
    return;
  }

  // Check if the card UID matches Name1 or Name2
  if (compareUID(mfrc522.uid.uidByte, Name1)) {
    Serial.println("Name: Tushar | ID: 011202080");
    // Add code here to record attendance for Tushar (e.g., update a database or set a flag)
  } else if (compareUID(mfrc522.uid.uidByte, Name2)) {
    Serial.println("Name: Lrk | ID: 011202283");
    // Add code here to record attendance for Lrk (e.g., update a database or set a flag)
  } else {
    Serial.println("Unknown card. Access denied!");
  }

  // Halt PICC
  mfrc522.PICC_HaltA();

  // Stop encryption on PCD
  mfrc522.PCD_StopCrypto1();
}

bool compareUID(byte* cardID, byte* expectedID) {
  for (int i = 0; i < 4; i++) {
    if (cardID[i] != expectedID[i]) {
      return false;
    }
  }
  return true;
}
