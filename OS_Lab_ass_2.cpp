#include<bits/stdc++.h>
using namespace std;

int main()
{
    int n;
    cout<<"Enter the number of processes: ";
    cin>>n;

    vector<int> priority(n), arrival_time(n), burst_time(n);
    for(int i = 0; i < n; i++) {
        cout<<"Process "<<i+1<<":"<<endl;
        cout<<"\tPriority: ";
        cin>>priority[i];
        cout<<"\tArrival Time: ";
        cin>>arrival_time[i];
        cout<<"\tBurst Time: ";
        cin>>burst_time[i];
    }
    vector<int> process_id(n);
    for(int i = 0; i < n; i++) {
        process_id[i] = i+1;
    }

    // Sorting processes based on arrival time
    vector<int> temp = process_id;
    sort(temp.begin(), temp.end(), [&](int a, int b) {
        if (arrival_time[a-1] == arrival_time[b-1]) {
            // If arrival times are same, sort based on priority
            return priority[a-1] < priority[b-1];
        }
        else {
            return arrival_time[a-1] < arrival_time[b-1];
        }
    });
    for(int i = 0; i < n; i++) {
        process_id[i] = temp[i];
    }

    ///Priority Scheduling
    int time = 0, completed = 0;
    vector<int> response_time(n);
    vector<int> completion_time(n), remaining_time = burst_time, waiting_time(n), turnaround_time(n);
    priority_queue<pair<int, int>, vector<pair<int, int>>, greater<pair<int, int>>> ready_queue;
    while(completed < n) {
        // Adding the processes that have arrived at the current time to the ready queue
        for(int i = 0; i < n; i++) {
            if(arrival_time[process_id[i]-1] <= time && remaining_time[process_id[i]-1] > 0) {
                ready_queue.push(make_pair(priority[process_id[i]-1], process_id[i]));
            }
        }

        // Selecting the process with the highest priority from the ready queue
        if(!ready_queue.empty()) {
            int current_process = ready_queue.top().second;
            ready_queue.pop();

            // Incrementing the response time for the current process
            if(remaining_time[current_process-1] == burst_time[current_process-1]) {
                response_time[current_process-1] = time - arrival_time[current_process-1];
            }
            // Decrementing the remaining time of the current process by 1
            remaining_time[current_process-1]--;

            // Updating the completion time if the process has completed
            if(remaining_time[current_process-1] == 0) {
                completion_time[current_process-1] = time + 1;
                completed++;
            }
            time++;
        }
        else time++;
    }

    cout<<endl<<"Priority Scheduling:"<<endl;
    cout<<"Process ID\tCompletion Time\tTurnaround Time\tWaiting Time"<<endl;
    for(int i = 0; i < n; i++) {
        turnaround_time[i] = completion_time[i] - arrival_time[i];
        waiting_time[i] = turnaround_time[i] - burst_time[i];
        cout<<process_id[i]<<"\t\t"<<completion_time[i]<<"\t\t"<<turnaround_time[i]<<"\t\t"<<waiting_time[i]<<endl;
    }
    double avg_turnaround_time = 0.0, avg_waiting_time = 0.0;
    for(int i = 0; i < n; i++) {
        avg_turnaround_time += turnaround_time[i];
        avg_waiting_time += waiting_time[i];
    }
    avg_turnaround_time /= n;
    avg_waiting_time /= n;
    cout<<endl<<"Average Turnaround Time: "<<avg_turnaround_time<<endl;
    cout<<"Average Waiting Time: "<<avg_waiting_time<<endl;
    cout<<"Average Response Time: "<<avg_waiting_time<<" ( Same as waiting time Cz non_Premptive )"<<endl;

    // Shortest Remaining Time First Scheduling
    time = 0, completed = 0;
    vector<int> response_time1(n);
    remaining_time = burst_time;
    ready_queue = priority_queue<pair<int, int>, vector<pair<int, int>>, greater<pair<int, int>>>();
    while(completed < n) {
        // Adding the processes that have arrived at the current time to the queue
        for(int i = 0; i < n; i++) {
            if(arrival_time[process_id[i]-1] <= time && remaining_time[process_id[i]-1] > 0) {
                ready_queue.push(make_pair(remaining_time[process_id[i]-1], process_id[i]));
            }
        }

        // Selecting the process with the shortest remaining time from the queue
        if(!ready_queue.empty()) {
            int current_process = ready_queue.top().second;
            ready_queue.pop();

            // Incrementing the response time for the current process
            if(remaining_time[current_process-1] == burst_time[current_process-1]) {
                response_time1[current_process-1] = time - arrival_time[current_process-1];
            }

            // Decrementing the remaining time of the current process by 1
            remaining_time[current_process-1]--;

            // Updating the completion time if the process has completed
            if(remaining_time[current_process-1] == 0) {
                completion_time[current_process-1] = time + 1;
                completed++;
            }
            time++;
        }
        else time++;
    }
    cout<<endl<<"Shortest Remaining Time First Scheduling:"<<endl;
    cout<<"Process ID\tCompletion Time\tTurnaround Time\tWaiting Time\tResponse Time"<<endl;
    for(int i = 0; i < n; i++) {
        turnaround_time[i] = completion_time[i] - arrival_time[i];
        waiting_time[i] = turnaround_time[i] - burst_time[i];
        cout<<process_id[i]<<"\t\t"<<completion_time[i]<<"\t\t"<<turnaround_time[i]<<"\t\t"<<waiting_time[i]<<"\t\t"<<response_time1[i]<<endl;
    }

    double avg_turnaround_time1 = 0.0, avg_waiting_time1 = 0.0, avg_response_time1 = 0.0;
    for(int i = 0; i < n; i++) {
        avg_turnaround_time1 += turnaround_time[i];
        avg_waiting_time1 += waiting_time[i];
        avg_response_time1 += response_time1[i];
    }
    avg_turnaround_time1 /= n;
    avg_waiting_time1 /= n;
    avg_response_time1 /= n;
    cout<<endl<<"Average Turnaround Time: "<<avg_turnaround_time1<<endl;
    cout<<"Average Waiting Time: "<<avg_waiting_time1<<endl;
    cout<<"Average Response Time: "<<avg_response_time1<<endl;

    return 0;
}
