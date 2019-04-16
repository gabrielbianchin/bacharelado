from PIL import Image
import sys
import random
import numpy as np
from sklearn import preprocessing
from sklearn.neural_network import MLPClassifier

clf = MLPClassifier(max_iter=100000, hidden_layer_sizes=(5, 4), learning_rate_init=0.01)

arquivo = open('dados.txt','w')
for cont in range(40):
	filename = 'treina' + str(cont) + '.png'
	image = Image.open(filename)
	largura, altura = image.size
	rgb_im = image.convert('RGB')
	rm = 0
	gm = 0
	bm = 0
	rcont = 0
	gcont = 0
	bcont = 0
	for i in range(largura):
		for j in range(altura):
			r, g, b = rgb_im.getpixel((i,j))
			rcont = rcont + r
			gcont = gcont + g
			bcont = bcont + b
	rm = rcont / (largura * altura)
	gm = gcont / (largura * altura)
	bm = bcont / (largura * altura)
	if cont < 10:
		peso = random.randint(1,5)
	elif cont >= 10 and cont < 20:
		peso = random.randint(300,400)
	elif cont >= 20 and cont < 30:
		peso = random.randint(10,25)
	else:
		peso = random.randint(100,200)
	arquivo.write(str(int(rm)) + " " + str(int(gm)) + " " + str(int(bm)) + " " + str(peso) + "\n")

arquivo.close()



arquivo = open('postreinamento.csv','w')
for cont in range(12):
	filename = 'pos' + str(cont) + '.png'
	image = Image.open(filename)
	largura, altura = image.size
	rgb_im = image.convert('RGB')
	rm = 0
	gm = 0
	bm = 0
	rcont = 0
	gcont = 0
	bcont = 0
	for i in range(largura):
		for j in range(altura):
			r, g, b = rgb_im.getpixel((i,j))
			rcont = rcont + r
			gcont = gcont + g
			bcont = bcont + b
	rm = rcont / (largura * altura)
	gm = gcont / (largura * altura)
	bm = bcont / (largura * altura)
	if cont < 3:
		peso = random.randint(1,5)
	elif cont >= 3 and cont < 6:
		peso = random.randint(300,400)
	elif cont >= 6 and cont < 9:
		peso = random.randint(10,25)
	else:
		peso = random.randint(100,200)
	arquivo.write(str(int(rm)) + "," + str(int(gm)) + "," + str(int(bm)) + "," + str(peso) + "\n")


arquivo.close()



#kmeans
arquivo = open('dados.txt','r')

Rdado = []
Gdado = []
Bdado = []
pesodado = []
centro = []
centroR = []
centroG = []
centroB = []
centropeso = []
dist = []
anterior = []

for linha in arquivo:
	t = linha.rstrip().split()
	r = float(t[0])
	g = float(t[1])
	b = float(t[2])
	peso = int(t[3])
	Rdado.append(r)
	Gdado.append(g)
	Bdado.append(b)
	pesodado.append(peso)
	dist.append(10000000)
	centro.append(-1)
	anterior.append(-1)

#pega qualquer valor referente a cada alimento para setar um centro

i = random.randint(0,9)
auxR = Rdado[i]
auxG = Gdado[i]
auxB = Bdado[i]
auxpeso = pesodado[i]
centroR.append(auxR)
centroG.append(auxG)
centroB.append(auxB)
centropeso.append(auxpeso)

i = random.randint(10,19)
auxR = Rdado[i]
auxG = Gdado[i]
auxB = Bdado[i]
auxpeso = pesodado[i]
centroR.append(auxR)
centroG.append(auxG)
centroB.append(auxB)
centropeso.append(auxpeso)

i = random.randint(20,29)
auxR = Rdado[i]
auxG = Gdado[i]
auxB = Bdado[i]
auxpeso = pesodado[i]
centroR.append(auxR)
centroG.append(auxG)
centroB.append(auxB)
centropeso.append(auxpeso)

i = random.randint(30,39)
auxR = Rdado[i]
auxG = Gdado[i]
auxB = Bdado[i]
auxpeso = pesodado[i]
centroR.append(auxR)
centroG.append(auxG)
centroB.append(auxB)
centropeso.append(auxpeso)

for i in range(5000):
	troca = 0
	for j in range(4):
		rcentro = centroR[j]
		gcentro = centroG[j]
		bcentro = centroB[j]
		pesocentro = centropeso[j]
		for k in range(40):
			r = Rdado[k]
			g = Gdado[k]
			b = Bdado[k]
			peso = pesodado[k]
			distAux = pow((((r - rcentro) * (r - rcentro)) + ((g - gcentro) * (g - gcentro)) + ((b - bcentro) * (b - bcentro)) + ((peso - pesocentro) * (peso - pesocentro))), 0.5)
			if distAux < dist[k]:
				dist[k] = distAux
				centro[k] = j
	for j in range(4):
		qt = 0
		somaR = 0
		somaG = 0
		somaB = 0
		somapeso = 0
		for k in range(40):
			if centro[k] == j:
				qt = qt + 1
				somaR = somaR + Rdado[k]
				somaG = somaG + Gdado[k]
				somaB = somaB + Bdado[k]
				somapeso = somapeso + pesodado[k]
		if qt == 0:
			qt = 1
		centroR[j] = somaR / qt
		centroG[j] = somaG / qt
		centroB[j] = somaB / qt
		centropeso[j] = somapeso / qt
	
	for j  in range(40):
		if centro[j] != anterior[j]:
			troca = troca + 1
		anterior[j] = centro[j]

	if troca == 0:
		break

arq = open('entrada.csv','w')
for j in range(40):
	arq.write(str(int(Rdado[j])) + "," + str(int(Gdado[j])) + "," + str(int(Bdado[j])) + "," + str(int(pesodado[j])) + "\n")

arqf = open('saida.csv','w')
for i in range(4):
	for j in range(40):	
		if centro[j] == i:
			if i == 0:
				arqf.write("1,0,0,0\n")
			elif i == 1:
				arqf.write("0,1,0,0\n")
			elif i == 2:
				arqf.write("0,0,1,0\n")
			else:
				arqf.write("0,0,0,1\n")
				
arq.close()
arquivo.close()
arqf.close()

def classifica(lista):
	maior = -100
	pos = -1
	for i in range(4):
		if lista[i] > maior:
			maior = lista[i]
			pos = i
	return pos


#mlp
entradasT = np.genfromtxt('entrada.csv', delimiter=',')
sc = preprocessing.StandardScaler()
entradas = sc.fit_transform(entradasT)
saidas = np.genfromtxt('saida.csv', delimiter=',')
posT = np.genfromtxt('postreinamento.csv', delimiter=',')
pos = sc.fit_transform(posT)
taxaAcerto = 0


clf.fit(entradas,saidas)
resultado = clf.predict_proba(pos)

acerto = 0

for i in range(12):
    x = classifica(resultado[i])
    if x == 0:
	    print ("Foto " + str(i) + " : \tArroz")

    elif x == 1:
	    print ("Foto " + str(i) + " : \tMilho")

    elif x == 2:
	    print ("Foto " + str(i) + " : \tTomate")
           
    else:
	    print ("Foto " + str(i) + " : \tMaca")
