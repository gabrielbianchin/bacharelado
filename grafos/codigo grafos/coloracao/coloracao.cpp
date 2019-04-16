#include<bits/stdc++.h>
using namespace std;

vector<vector<int> > grafo;
vector<vector<int> > cor;
int vertice,aresta,v1,v2,vis[10005];

void coloracao(int u){
    int c=cor[u][0],p=0;
    vis[u]=1;
    while(c==-1){
        p++;
        c=cor[u][p];
    }
    cout<<"Vertice: "<<u<<"\tCor: "<<c<<endl;
    for(int i=0;i<grafo[u].size();i++){
        int k=grafo[u][i];
        for(int j=0;j<cor[k].size();j++){
            if(c==cor[k][j])
                cor[k][j]=-1;
        }
    }
    for(int i=0;i<grafo[u].size();i++){
        int k=grafo[u][i];
        if(vis[k]==0)
            coloracao(k);
    }
}


int main(){
    FILE *file;
    file = fopen("teste.txt","r");
    fscanf(file,"%d %d",&vertice,&aresta);
    for(int i=1;i<=vertice;i++)
        vis[i]=0;
    grafo.assign(vertice+1,vector<int>());
    cor.assign(vertice+1,vector<int>());
    for(int i=0;i<aresta;i++){
        fscanf(file,"%d %d",&v1,&v2);
        grafo[v1].push_back(v2);
        grafo[v2].push_back(v1);
    }
    for(int i=1;i<=vertice;i++){
        for(int j=1;j<=i;j++){
            cor[i].push_back(j);
        }
    }
    cout<<"Coloracao: "<<endl<<endl;
    coloracao(1);
    fclose(file);
    return 0;
}
