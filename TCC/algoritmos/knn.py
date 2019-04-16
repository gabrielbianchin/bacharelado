from sklearn.neighbors import KNeighborsClassifier
import numpy as np
from sklearn.externals import joblib

def classifica(lista):
	if lista[0] > lista[1]:
		return "Efetora"
	else:
		return "Nao efetora"

entrada = np.genfromtxt('../dados/entrada.csv')
saida = np.genfromtxt('../dados/saida.csv', delimiter=',')
treinamento = np.genfromtxt('../dados/treinamento.csv')

neigh = KNeighborsClassifier(n_neighbors=7)
neigh.fit(entrada, saida)
filename = 'knn.sav'
joblib.dump(neigh, filename)

resultado = neigh.predict(treinamento)

acerto = 0

for i in range(len(resultado)):
	result = classifica(resultado[i])
	if i < 69 and result == "Efetora":
		acerto += 1
	if i >= 69 and result == "Nao efetora":
		acerto += 1

print (float(acerto)/float(len(treinamento)) * 100.0)