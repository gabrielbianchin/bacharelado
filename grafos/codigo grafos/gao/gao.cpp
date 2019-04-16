#include<bits/stdc++.h>
using namespace std;

int vertice,aresta,v1,v2,w,vis[10005],pai[10005],d[10005];
vector<vector<pair<int,int> > > g;
vector<int> aux;
int const INF = 0x3f3f3f3f;

void dfs(int k){
    vis[k]=1;
    for(int i=0;i<g[k].size();i++){
        int v=g[k][i].first;
        if(vis[v]==0)
            dfs(v);
    }
    aux.push_back(k);
}

void inicializa(){
    for(int i=0;i<vertice;i++){
        pai[i]=-1;
        d[i]=INF;
    }
    d[0]=0;
}


int main(){
    FILE *file;
    file = fopen("teste.txt","r");
    fscanf(file,"%d %d",&vertice,&aresta);
    g.assign(vertice+1,vector<pair<int,int> >());
    for(int i=0;i<aresta;i++){
        fscanf(file,"%d %d %d",&v1,&v2,&w);
        g[v1].push_back(make_pair(v2,w));
    }
    for(int i=0;i<vertice;i++){
        if(vis[i]==0)
            dfs(i);
    }
    reverse(aux.begin(),aux.end());
    inicializa();
    for(int i=0;i<aux.size();i++){
        for(int j=0;j<g[i].size();j++){
            int v = g[i][j].first;
            int w = g[i][j].second;
            if(d[v] > d[i] + w){
                d[v] = d[i] + w;
                pai[v] = i;
            }
        }
    }

    for(int i=0;i<vertice;i++)
        cout<<"Vertice: "<<i<<"\tDistancia: "<<d[i]<<"\tPai: "<<pai[i]<<endl;
}
