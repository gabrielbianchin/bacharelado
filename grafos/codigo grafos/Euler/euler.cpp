#include<bits/stdc++.h>
using namespace std;

vector<vector<int> > g;
int vertice,aresta,a,b,vf=0,k,num,id=0;

void funcao(int u){
    cout<<u;
    if(id!=aresta){
        id++;
        cout<<" -> ";
    }
    else{}
    if(g[u].empty())
        return;
    k=g[u][0];
    for(int i=0;i<g[u].size();i++)
        g[u][i]=g[u][i+1];
    for(int i=0;i<g[k].size();i++){
        if(g[k][i]==u)
            num=i;
    }
    for(int i=num;i<g[k].size();i++)
        g[k][i]=g[k][i+1];
    g[u].pop_back();
    g[k].pop_back();
    funcao(k);
}

int main(){
    FILE *file;
    file = fopen("teste.txt","r");
    fscanf(file,"%d %d",&vertice,&aresta);
    g.assign(vertice+1,vector<int>());
    for(int i=0;i<aresta;i++){
        fscanf(file,"%d %d",&a,&b);
        g[a].push_back(b);
        g[b].push_back(a);
    }
    cout<<"Algoritmo de Fleury:"<<endl;
    funcao(vf);
    cout<<endl;
    return 0;
}
