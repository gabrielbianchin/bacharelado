#include<bits/stdc++.h>
using namespace std;

int dist[10005],pai[10005],vertice,aresta;
const int INF =0x3f3f3f3f;

struct a{
    int v1,v2,w;
};

void inicializa(){
    for(int i=0;i<vertice;i++){
        dist[i]=INF;
        pai[i]=-1;
    }
    dist[0]=0;
}

void backtracking(int k){
    if(pai[k]==-1){
        cout<<k<<endl;
        return;
    }
    cout<<k<<" <- ";
    backtracking(pai[k]);
}

int main(){
    FILE *file;
    file = fopen("teste.txt","r");
    fscanf(file,"%d %d",&vertice,&aresta);
    inicializa();
    struct a f[aresta];
    for(int i=0;i<vertice;i++){
        for(int j=0;j<aresta;j++){
            if(i==0){
                fscanf(file,"%d %d %d",&f[j].v1,&f[j].v2,&f[j].w);
                f[j].v1-=1;
                f[j].v2-=1;
            }
            else{
                if(dist[f[j].v2] > dist[f[j].v1] + f[j].w){
                    dist[f[j].v2] = dist[f[j].v1] + f[j].w;
                    pai[f[j].v2] = f[j].v1;
                }
            }
        }
    }
    cout<<"Bellman-Ford:"<<endl;
    for(int i=0;i<vertice;i++){
        if(pai[i]==-1)
            cout<<"Vertice: "<<i+1<<"\tDistancia da origem: "<<dist[i]<<"\tVertice pai: NULL"<<endl;
        else
            cout<<"Vertice: "<<i+1<<"\tDistancia da origem: "<<dist[i]<<"\tVertice pai: "<<pai[i]+1<<endl;
    }
    cout<<endl<<"Backtracking:"<<endl;
    backtracking(vertice-1);
    return 0;
}
