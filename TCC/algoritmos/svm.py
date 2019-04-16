from sklearn import svm
from sklearn.preprocessing import StandardScaler
import numpy as np

def classifica(lista):
	if lista == 0:
		return "Efetora"
	else:
		return "Nao efetora"

entrada = np.genfromtxt('entrada.csv')
saida = []
treinamento = np.genfromtxt('treinamento.csv')

for i in range(180):
	saida.append(0)

for i in range(180):
	saida.append(1)

scaler = StandardScaler()
scaler.fit(entrada)
entrada = scaler.transform(entrada)
treinamento = scaler.transform(treinamento)

clf = svm.NuSVC()
clf.fit(entrada, saida)

resultado = clf.predict(treinamento) 

acerto = 0

for i in range(len(resultado)):
	result = classifica(resultado[i])
	if i < 69 and result == "Efetora":
		acerto += 1
	if i >= 69 and result == "Nao efetora":
		acerto += 1

print acerto
print len(treinamento)
print float(acerto)/float(len(treinamento)) * 100.0