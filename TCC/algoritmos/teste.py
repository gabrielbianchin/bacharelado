from sklearn.externals import joblib
from sklearn.neighbors import KNeighborsClassifier
import numpy as np

def classifica(lista):
	if lista[0] > lista[1]:
		return "Efetora"
	else:
		return "Nao efetora"

filename = 'knn.sav'
loaded_model = joblib.load(filename)
treinamento = np.genfromtxt('../dados/treinamento.csv')
resultado = loaded_model.predict(treinamento)

acerto = 0

for i in range(len(resultado)):
	result = classifica(resultado[i])
	if i < 69 and result == "Efetora":
		acerto += 1
	if i >= 69 and result == "Nao efetora":
		acerto += 1

print (float(acerto)/float(len(treinamento)) * 100.0)