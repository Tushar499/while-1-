#include<bits/stdc++.h>
using namespace std;

bool comparator(pair<pair<int,int>,pair<int,int>>&p1,pair<pair<int,int>,pair<int,int>>&p2)
{
    if(p1.first.first==p2.first.first){
        return p1.second.first>p2.second.first;
    }
}

int main()
{
    int n;cin>>n;
    pair<pair<int,int>,pair<int,int>>pr[n];
    for(int i=0;i<n;i++){
        cin>>pr[i].first.first>>pr[i].second.first;
        pr[i].first.second=i;
       // pr[i].second.second=i;
    }
    int a,b;
    cin>>a>>b;
    sort(pr,pr+n,comparator);
    int now=a,profit=0;
    cout<<"Recommended jobs : "<<endl;
    for(int i=0;i<n;i++){
        int x = pr[i].first.first;
        int y = pr[i].second.first;
        if(y>=now&&y<=b){
            cout<<"job "<<pr[i].first.second+1<<". you can starts at "<<now<<", "<<"ends at "<<now+x<<", "<<" earning will be "<<y<<endl;
            //now=0;
            now+=x;
            profit+=y;
        }
    }
    cout<<"expected total earning "<<profit<<" dollars"<<endl;

}



