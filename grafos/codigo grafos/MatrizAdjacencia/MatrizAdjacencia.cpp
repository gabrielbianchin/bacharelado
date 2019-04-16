#include<bits/stdc++.h>
using namespace std;
int n;
struct matriz{
    int mat[100][100];
};

int main(){
    FILE *file;
    file = fopen("teste.txt","r");
    fscanf(file,"%d",&n);
    struct matriz f[n-1];
    int m[n][n];
    for(int i=0;i<n;i++){
        for(int j=0;j<n;j++){
            fscanf(file,"%d",&f[0].mat[i][j]);
            m[i][j]=f[0].mat[i][j];
        }
    }
    for(int l=1;l<n-1;l++){
        for(int i=0;i<n;i++){
            for(int j=0;j<n;j++){
                for(int k=0;k<n;k++){
                    if(l==1){
                        f[l].mat[i][j]+=f[0].mat[i][k]*f[0].mat[k][j];
                    }
                    else{
                        f[l].mat[i][j]+=f[l-1].mat[i][k]*f[0].mat[k][j];
                    }
                }
                m[i][j]+=f[l].mat[i][j];
            }
        }
    }
    int c=0;
    for(int i=0;i<n;i++){
        for(int j=0;j<n;j++){
            if(i!=j){
                if(m[i][j]!=0)
                    c++;
            }
        }
    }
    if(c==(n*n)-n)
        cout<<"O grafo e conectado!"<<endl;
    else
        cout<<"O grafo nao e conectado!"<<endl;
    fclose(file);
    return 0;
}
