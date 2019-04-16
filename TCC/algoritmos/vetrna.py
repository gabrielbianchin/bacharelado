from sklearn.neural_network import MLPClassifier
from sklearn.preprocessing import StandardScaler
from sklearn.externals import joblib
import numpy as np

def classifica(lista):
	if lista[0] > lista[1]:
		return "Efetora"
	else:
		return "Nao efetora"

clf = []

tam = 5

for i in range(tam):
	clf.append(MLPClassifier(max_iter=1000, hidden_layer_sizes=(5, 5, 2), learning_rate_init=0.001))

scaler = StandardScaler()

entrada = np.genfromtxt('../dados/entrada.csv')
saida = np.genfromtxt('../dados/saida.csv', delimiter=',')
treinamento = np.genfromtxt('../dados/treinamento.csv')

scaler.fit(entrada)
entrada = scaler.transform(entrada)
treinamento = scaler.transform(treinamento)

resultado = []

for i in range(tam):
	clf[i].fit(entrada,saida)
	resultado.append(clf[i].predict_proba(treinamento))

acerto = 0

for i in range(138):
	contefe = 0
	contnefe = 0
	for j in range(len(resultado)):
		result = classifica(resultado[j][i])
		if result == "Efetora":
			contefe += 1
		else:
			contnefe += 1
	if contefe > contnefe and i < 69:
		acerto += 1
	if i >= 69 and contnefe > contefe:
		acerto += 1

print float(acerto)/float(len(treinamento)) * 100.0
