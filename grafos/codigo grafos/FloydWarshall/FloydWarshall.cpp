#include<bits/stdc++.h>
using namespace std;

int vertice, aresta, v1, v2, w;
const int INF = 0x3f3f3f3f;

int main(){
    FILE *file;
    file = fopen("teste.txt","r");
    fscanf(file,"%d %d",&vertice,&aresta);
    int mat[vertice][vertice];
    for(int i=0;i<vertice;i++){
        for(int j=0;j<vertice;j++){
            mat[i][j]=INF;
        }
    }
    for(int i=0;i<aresta;i++){
        fscanf(file,"%d %d %d",&v1,&v2,&w);
        mat[v1][v2]=w;
    }
    for(int k=0;k<vertice;k++){
        for(int i=0;i<vertice;i++){
            for(int j=0;j<vertice;j++){
                if(mat[i][k]+mat[k][j]<mat[i][j] && i!=j)
                    mat[i][j]=mat[i][k]+mat[k][j];
            }
        }
    }
    cout<<endl<<"Floyd Warshall:"<<endl<<endl;
    for(int i=0;i<vertice;i++){
        for(int j=0;j<vertice;j++){
            if(mat[i][j]==INF)
                printf("INF\t");
            else
                printf("%d\t",mat[i][j]);
        }
        cout<<endl;
    }
    return 0;
}
