/**
Peace Be Upon You
-----------------------                                                                     **/

#include<bits/stdc++.h>
using namespace std;
///Data_type_compressions :
#define     ll                              long long int
///constants :
const int   N                               = (int) 1e6+5;
const int   M                               = (int) 1e9+5;
const int   mod                             = (int) 1000000007;
///STL :
#define     vi                              vector<int>
#define     vl                              vector<ll>
#define     si                              set<int>
#define     sl                              set<ll>
#define     mii                             map<int,int>
#define     mll                             map<ll,ll>
#define     PQ                              priority_queue
#define     hashmap                         unordered_map
#define     pb                              push_back
#define     spb                             insert
#define     erase_duplicates(x)             x.erase(unique(all(x)),x.end())
#define     erase_space(s)                  s.erase(remove(s.begin(), s.end(), ' '), s.end())
#define     to_lower(s)                     transform(s.begin(), s.end(), s.begin(), ::tolower)
#define     to_upper(s)                     transform(s.begin(), s.end(), s.begin(), ::toupper)
#define     all(x)                          x.begin(),x.end()
#define     all_0(x)                        memset(x,0,sizeof(x))
#define     all_neg(x)                      memset(x,-1,sizeof(x))
#define     all_1(x)                        memset(x,1,sizeof(x))
///I/O :
#define     Faster                          ios_base::sync_with_stdio(false);cin.tie(0);cout.tie(0);
#define     Read(x)                         freopen(x,"r",stdin)
#define     Write(x)                        freopen(x,"w",stdout)

#define     YES                             printf("YES\n")
#define     Yes                             printf("Yes\n")
#define     NO                              printf("NO\n")
#define     No                              printf("No\n")
#define     nl                              "\n"
///extras :
#define     t2r                             int main()
#define     in_range(i,x,y)                 for(int i=x;i<y;i++)
#define     in_range_back(i,x,y)            for(int i=y;i>=x;i--)


//..............................................Let's Start with t2r.................................................


void solve()
{
    string s;
    cin>>s;
    vector<int>arr;
    set<int>st;
    int len=s.size();
    in_range(i,0,len){
        if(s[i]>=48 && s[i]<=57){
            arr.pb(i);
            int x=s[i]-'0';
            st.insert(x);
        }
    }
    
    if(st.size()==1){
        //set<int>::iterator it;
        //for (it = st.begin(); it != st.end(); it++){
        for(auto &it:arr)cout<<it<<' ';
            cout<<nl;
        int n=*st.begin();
        cout<<n<<' ';
        if(n%3==0 && n>=3){
        cout<<"3_Equal\n";
        }
        else if(n>4 && n%3==2 || n>4 && n%3==1) {
        cout<<"2_Equal\n";
        }else cout<<"Invalid\n";

    }else if(st.size()>1){
        for(auto &it:arr)cout<<it<<' ';
            cout<<nl;
        set<int>::reverse_iterator rit;
        for (rit=st.rbegin(); rit!=st.rend(); rit++)
        cout <<*rit<<' ';
        cout<<nl;
    }
    
}



t2r
{
    Faster;
    #ifndef ONLINE_JUDGE 
        Read("input.txt"); 
        Write("output.txt"); 
    #endif  ///Tushar499 
    int t=1;
    cin>>t;
    while(t--)
    {
        solve();
    }
    return 0;
}


