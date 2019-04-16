from sklearn.ensemble import RandomForestClassifier
import numpy as np

def classifica(lista):
	if lista[0] > lista[1]:
		return "Efetora"
	else:
		return "Nao efetora"

clf = RandomForestClassifier(n_estimators=7)

entrada = np.genfromtxt('entrada.csv')
saida = np.genfromtxt('saida.csv', delimiter=',')
treinamento = np.genfromtxt('treinamento.csv')

clf.fit(entrada,saida)

resultado = clf.predict(treinamento)

acerto = 0

for i in range(len(resultado)):
	result = classifica(resultado[i])
	if i < 69 and result == "Efetora":
		acerto += 1
	if i >= 69 and result == "Nao efetora":
		acerto += 1

print float(acerto)/float(len(treinamento)) * 100.0