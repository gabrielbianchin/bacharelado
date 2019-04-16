#include<bits/stdc++.h>
using namespace std;

vector<vector<pair<int, int> > > g;
int vert,ares,v1,v2,w;
int pai[10005],dist[10005];
const int INF = 0x3f3f3f3f;
priority_queue<pair<int, int> > pq;

void mostra_caminho(int u){
    if(u==pai[u]){
        printf("%d",u);
        return;
    }
    mostra_caminho(pai[u]);
    printf(" -> %d",u);
}

void dijkstra(){
    pq.push(make_pair(0,1));
    dist[1]=0;
    pai[1]=1;
    while(!pq.empty()){
        int v=pq.top().second;
        int p=-pq.top().first;
        pq.pop();
        if(p>dist[v])
            continue;
        for(int i=0;i<(int)g[v].size();i++){
            int vv=g[v][i].first;
            int pp=g[v][i].second;
            if(dist[vv]>dist[v]+pp){
                dist[vv]=dist[v]+pp;
                pq.push(make_pair(-dist[vv],vv));
                pai[vv]=v;
            }
        }
    }
}

int main(){
    FILE *file;
    file=fopen("teste.txt","r");
    fscanf(file,"%d %d",&vert,&ares);
    g.assign(vert+1,vector<pair<int, int> >());
    memset(dist,INF,sizeof dist);
    memset(pai,INF,sizeof pai);
    for(int i=0; i<ares;i++){
        fscanf(file,"%d %d %d",&v1,&v2,&w);
        g[v1].push_back(make_pair(v2,w));
        g[v2].push_back(make_pair(v1,w));
    }
    cout<<"Dijkstra:"<<endl;
    dijkstra();
    for(int i=1;i<=vert;i++)
        cout<<i<<" -> "<<dist[i]<<endl;
    cout<<endl<<"Caminho:"<<endl;
    mostra_caminho(vert);
    cout<<endl;
    fclose(file);
    return 0;
}
