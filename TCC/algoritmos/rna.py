from sklearn.neural_network import MLPClassifier
from sklearn.preprocessing import StandardScaler
import numpy as np
from sklearn.externals import joblib
import pickle

def classifica(lista):
	if lista[0] > lista[1]:
		return "Efetora"
	else:
		return "Nao efetora"

clf = MLPClassifier(max_iter=10000, hidden_layer_sizes=(5, 2), learning_rate_init=0.001)
scaler = StandardScaler()

entrada = np.genfromtxt('../dados/entrada.csv')
saida = np.genfromtxt('../dados/saida.csv', delimiter=',')
treinamento = np.genfromtxt('../dados/treinamento.csv')

scaler.fit(entrada)
entrada = scaler.transform(entrada)
treinamento = scaler.transform(treinamento)

clf.fit(entrada,saida)

filename = 'rna.sav'
joblib.dump(clf,filename)
#clf = pickle.load(open(filename,'rb'))

resultado = clf.predict_proba(treinamento)

acerto = 0

for i in range(len(resultado)):
	result = classifica(resultado[i]) 
	if i < 69 and result == "Efetora":
		acerto += 1
	if i >= 69 and result == "Nao efetora":
		acerto += 1

print (float(acerto)/float(len(treinamento)) * 100.0)
