#include<bits/stdc++.h>
using namespace std;

vector<vector<int> > g;

int ares,vert,dist[10005],des[10000],dist_destino;

void bfs(int ori,int dest){
    memset(dist,-1,sizeof dist);
    dist[ori]=0;
    queue<int>fila;
    fila.push(ori);
    while(!fila.empty()){
        int u=fila.front();
        fila.pop();
        for(int i=0;i<(int)g[u].size();i++){
            int v=g[u][i];
            if(dist[v]==-1){
                dist[v]= dist[u]+1;
                fila.push(v);
            }
        }
    }
    for(int i=1;i<=vert;i++){
        printf("%d(%d)\n",i,dist[i]);
        dist_destino=dist[i];
    }
}

void backtracking(){
    int maxi=-1,posmax;
    for(int i=1;i<=vert;i++){
        if(dist[i]>maxi){
            maxi=dist[i];
            posmax=i;
        }
    }
    cout<<posmax<<" -> "<<maxi<<endl;
    while(maxi!=0){
        maxi--;
        for(int i=1;i<=vert;i++){
            if(dist[i]==maxi){
                int c=0;
                for(int j=0;j<(int)g[posmax].size();j++){
                    if(g[posmax][j]==i){
                        c=1;
                    }
                }
                if(c==1){
                    maxi=dist[i];
                    posmax=i;
                    break;
                }
            }
        }
        cout<<posmax<<" -> "<<maxi<<endl;
    }
}

void numCaminhos(int origem, int n){
	vector<int> mi(n);
	mi[n] = 1;
	for(int i=0;i<(int)g[n].size();i++){
		if(dist_destino==dist[g[n][i]]){
			mi[g[n][i]]=0;
		}
	}
	dist_destino--;
	while(dist_destino>=0){
		for(int i=0;i<n;i++){
			if(dist[i]==dist_destino){
				for(int j=0;j<(int)g[i].size();j++){
					if(dist[g[i][j]]==dist_destino + 1){
						mi[i] += mi[g[i][j]];
					}
				}
			}
		}
		dist_destino--;
	}
	cout<<mi[origem]<<endl;
}

int main(){
    FILE *file;
    file=fopen("teste.txt","r");
    fscanf(file,"%d %d",&vert,&ares);
    g.assign(vert+1,vector<int>());
    for(int i=0;i<ares;i++){
        int a,b;
        fscanf(file,"%d %d",&a,&b);
        g[a].push_back(b);
        g[b].push_back(a);
    }
    cout<<"Busca em Largura:"<<endl;
    bfs(1,vert);
    cout<<endl<<"BackTracking:"<<endl;
    backtracking();
    cout<<endl<<"Quantidade de caminhos minimos: ";
    numCaminhos(1,vert);
    return 0;
}


