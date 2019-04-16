#include<bits/stdc++.h>
using namespace std;

vector<vector<int> >g;
int vis[10005],n,m,d[10005],f[10005],tempo;

void dfs(int u){
    printf("Visitando vertice %d\n",u);
    vis[u]=1;
    d[u]=++tempo;
    for(int i=0;i<g[u].size();i++){
        int v=g[u][i];
        if(vis[v]==0)
            dfs(v);
    }
    f[u]=++tempo;
}

int main(){
    FILE *file;
    file = fopen("teste.txt","r");
    fscanf(file,"%d %d",&n,&m);
    g.assign(n+1, vector<int>());
    for(int i=0;i<m;i++){
        int a,b;
        fscanf(file,"%d %d",&a,&b);
        g[a].push_back(b);
        g[b].push_back(a);
    }
    for(int i=1;i<=n;i++){
        if(vis[i] == 0){
            dfs(i);
        }
    }
    for(int i=1;i<=n;i++)
        printf("Vertice %d | D = %d | F = %d\n", i, d[i], f[i]);
    fclose(file);
    return 0;
}
