#include<bits/stdc++.h>
using namespace std;

vector<vector<int> > grafo;
vector<int> m,n;
int vertice,aresta,v1,v2;

void bipartido(int u){
    int c=0;
    sort(m.begin(),m.end());
    for(int i=0;i<grafo[u].size();i++){
        for(int j=0;j<m.size();j++){
            if(grafo[u][i]==m[j])
                c++;
        }
    }
    if(c==0)
        m.push_back(u);
    else
        n.push_back(u);
}

int main(){
    FILE *file;
    file=fopen("teste.txt","r");
    fscanf(file,"%d %d",&vertice,&aresta);
    grafo.assign(vertice+1,vector<int>());
    for(int i=0;i<aresta;i++){
        fscanf(file,"%d %d",&v1,&v2);
        grafo[v1].push_back(v2);
        grafo[v2].push_back(v1);
    }
    for(int i=1;i<=vertice;i++)
        bipartido(i);
    cout<<"Grupo 1:"<<endl;
    for(int i=0;i<m.size();i++)
        cout<<m[i]<<endl;
    cout<<"Grupo 2:"<<endl;
    for(int i=0;i<n.size();i++)
        cout<<n[i]<<endl;
    fclose(file);
    return 0;
}
