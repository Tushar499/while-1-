#include <Servo.h>
#include <Keypad.h>
#include <SPI.h>
#include <MFRC522.h>

#define SS_PIN 53 
#define RST_PIN 5

MFRC522 mfrc522(SS_PIN, RST_PIN); 

byte Name1[5] = {0xD3, 0x46, 0x14, 0x0A}; // Tushar UID card
byte Name2[5] = {0x43, 0x9E, 0x5D, 0x97}; // Lrk UID card
//-------

Servo myServo;
const byte ROWS = 4; 
const byte COLS = 4; 
char keys[ROWS][COLS] = {
  {'1', '2', '3', 'A'},
  {'4', '5', '6', 'B'},
  {'7', '8', '9', 'C'},
  {'*', '0', '#', 'D'}
};
byte rowPins[ROWS] = {22, 23, 24, 25}; 
byte colPins[COLS] = {26, 27, 28, 29}; 
Keypad keypad = Keypad( makeKeymap(keys), rowPins, colPins, ROWS, COLS );

int initialPos = 0; 
int rotationAmount = 110; 
int x=0,y=0,z=0,receive=0,sent=0;

void setup() {
  myServo.attach(11); 
  myServo.write(initialPos); 
  Serial.begin(9600); //----------------
  SPI.begin(); 
  mfrc522.PCD_Init(); 
  Serial.println("Put your card near the Scanner...");
  Serial.println();
}

void task1() {
  char taskKey = keypad.getKey();
  if (taskKey == 'A') {
    int targetPos = initialPos + rotationAmount;
    myServo.write(targetPos);
    delay(1000);
    myServo.write(initialPos);
  }
}

void loop() {
  char key = keypad.getKey();
  if (key) {
    Serial.println(key);
    if(key == 5){
      receive = 1;
    } 
    if (key == '7' && receive == 1) {
      myServo.write(120);
      delay(3000);
      myServo.write(initialPos);
      x=0;
    }if(key == '8' && receive == 1){
      myServo.write(240);
      delay(3000);
      myServo.write(initialPos);
      y=0;
    }
    if(key == '9' && receive == 1){
      myServo.write(360);
      delay(3000);
      myServo.write(initialPos);
      z=0;
    }
    if(key == 6){
        sent = 1;
      } 
      if (sent == 1 && x==0) {
        myServo.write(120);
        delay(3000);
        myServo.write(initialPos);
        x=1;
      }if(sent == 1 && y==0){
        myServo.write(240);
        delay(3000);
        myServo.write(initialPos);
        y=1;
      }
      if(sent == 1 && z==0){
        myServo.write(360);
        delay(3000);
        myServo.write(initialPos);
        z=1;
      }
  }
  //---------------
  if ( ! mfrc522.PICC_IsNewCardPresent()) {
    return;
  }

  if ( ! mfrc522.PICC_ReadCardSerial()) {
    return;
  }

  if (compareUID(mfrc522.uid.uidByte, Name1)) {
    Serial.println("Name: Tushar | ID: 011202080");
  } else if (compareUID(mfrc522.uid.uidByte, Name2)) {
    Serial.println("Name: Lrk | ID: 011202283");
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

//Version 1.0 (RFID + Servo)
//Database communication version is coming Soon!!