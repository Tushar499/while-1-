#include<bits/stdc++.h>
using namespace std;

bool comparator(pair<pair<int,int>,pair<int,int>>&p1,pair<pair<int,int>,pair<int,int>>&p2)
{
    if(p1.first.first==p2.first.first){
        return p1.second.first<p2.second.first;
    }
}

int main()
{
    int n;cin>>n;
    pair<pair<int,int>,pair<int,int>>pr[n];
    for(int i=0;i<n;i++){
        cin>>pr[i].first.first>>pr[i].second.first>>pr[i].second.second;
        pr[i].first.second=i;
    }
    int m,a,b;
    cin>>m>>a>>b;
    sort(pr,pr+n,comparator);
    int now=a,profit=0;
    cout<<"Recommended jobs : "<<endl;
    for(int i=0;i<n;i++){
        int x = pr[i].first.first;
        int y = pr[i].second.first;
        if(x>=now&&x<=b){
            cout<<"job "<<pr[i].first.second+1<<" starts at "<<x<<", "<<" ends at "<<x+y<<", "<<" difficulty "<<pr[i].second.second<<endl;
            now=0;
            now=x+y;
            profit+=m;
        }
    }
    cout<<"expected earning "<<profit<<" dollar"<<endl;

}


