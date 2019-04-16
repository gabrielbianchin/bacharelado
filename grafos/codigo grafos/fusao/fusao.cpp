#include<bits/stdc++.h>
using namespace std;
int main(){
    FILE *file;
    file = fopen("teste.txt","r");
    int n,a;
    fscanf(file,"%d",&n);
    int mat[n][n],m[n][n];
    for(int i=0;i<n;i++){
        for(int j=0;j<n;j++){
            fscanf(file,"%d",&a);
            if(i==j || a==0)
                mat[i][j]=0;
            else
                mat[i][j]=1;
        }
    }
    while(true){
        int s=0,x=-1,y=-1;
        for(int i=0;i<n;i++){
            for(int j=0;j<n;j++){
                if(i==j || mat[i][j]==0)
                    mat[i][j]=0;
                else
                    mat[i][j]=1;
            }
        }
        for(int i=0;i<n;i++){
            for(int j=0;j<n;j++){
                if(mat[i][j]==1 && i!=j && x==-1 && y==-1){
                    x=i;
                    y=j;
                }
            }
        }
        for(int k=0;k<n;k++)
            m[x][k]+=m[y][k];
        for(int k=0;k<n;k++)
            m[k][y]+=m[k][y];
        int h,k;
        int m1[n-1][n-1];
        for(int i=0,h=0;i<n;i++,h++){
            if(i==x){
                h--;
                continue;
            }
            for(int j=0,k=0;j<n;j++,k++){
                if(j==y){
                    k--;
                    continue;
                }
                    m1[h][k]=m[i][j];
            }
        }
        n--;
        memcpy(mat, m1, n*n*sizeof(int));
        for(int i=0;i<n;i++){
            for(int j=0;j<n;j++){
                if(i==j || mat[i][j]==0)
                    mat[i][j]=0;
                else{
                    mat[i][j]=1;
                    s++;
                }
            }
        }

        if(s==0 || n==1)
            break;
    }
    if(n==1)
        cout<<"O grafo e conectado"<<endl;
    else
        cout<<"O grafo nao e conectado"<<endl;
    fclose(file);
    return 0;
}
