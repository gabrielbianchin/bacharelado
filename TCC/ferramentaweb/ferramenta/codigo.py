import matplotlib
matplotlib.use('Agg')
from sklearn.preprocessing import StandardScaler
from sklearn.neural_network import MLPClassifier
from sklearn.neighbors import KNeighborsClassifier
import numpy as np
import os
import matplotlib.pyplot as plt
import datetime
from sklearn.externals import joblib

def knn(fasta):
	treinamento,cabecalho = getfastaknn(fasta)
	neigh = joblib.load('../ferramentaweb/ferramenta/knn.sav')
	resultado = neigh.predict(treinamento)
	result = []
	grafico = []
	tamanho = []
	for i in range(len(resultado)):
		lista = classifica(resultado[i])
		grafico.append(returnoefetora(resultado[i]))
		tamanho.append(i)
		if lista == "Efetora":
			result.append(str(cabecalho[i]) + " --- " + str(grafico[i]) + "%")
	titulo = '#'
	if len(resultado) <= 20:
		escalay = [0, 10, 20, 30, 40, 50, 60, 70, 80, 90, 100]
		plt.xticks(tamanho)
		plt.yticks(	escalay)
		scatter_plot = plt.scatter(tamanho,grafico)
		plt.xlabel('Proteínas')
		plt.ylabel('Taxa de probabilidade de ser efetora')
		now = datetime.datetime.now()
		titulo = 'static/'
		titulo2 = str(now.year)
		titulo2 += str(now.month)
		titulo2 += str(now.day)
		titulo2 += str(now.hour)
		titulo2 += str(now.minute)
		titulo2 += str(now.second)
		plt.savefig('ferramenta/static/' + titulo2)
		titulo += titulo2
		titulo += '.png'
		plt.clf()
	return result, len(result), titulo

def rna(fasta,porcentagem):
	treinamento,cabecalho = getfastarna(fasta)
	module_dir = os.path.dirname(__file__)  
	filename = os.path.join(module_dir, 'entradaRNA.csv')
	entrada = np.genfromtxt(filename)
	scaler = StandardScaler()
	scaler.fit(entrada)
	entrada = scaler.transform(entrada)
	treinamento = scaler.transform(treinamento)
	clf = joblib.load('../ferramentaweb/ferramenta/rna.sav')
	resultado = clf.predict_proba(treinamento)
	result = []
	grafico = []
	tamanho = []
	porcent = str(porcentagem)
	for i in range(len(resultado)):
		lista = resultado[i]
		print (str(lista[0]))
		efetora = lista[0] * 100.0
		grafico.append(returnoefetora(resultado[i]))
		tamanho.append(i)
		if porcent != 'None':
			numporcent = float(porcent)
			if porcent.isdigit() and efetora >= numporcent:
				result.append(str(cabecalho[i]) + " --- " + str(grafico[i]) + "%")
	titulo = '#'
	if len(resultado) <= 20:
		plt.xticks(tamanho)
		scatter_plot = plt.scatter(tamanho,grafico)
		plt.xlabel('Proteínas')
		plt.ylabel('Taxa de probabilidade de ser efetora')
		now = datetime.datetime.now()
		titulo = 'static/'
		titulo2 = str(now.year)
		titulo2 += str(now.month)
		titulo2 += str(now.day)
		titulo2 += str(now.hour)
		titulo2 += str(now.minute)
		titulo2 += str(now.second)
		plt.savefig('ferramenta/static/' + titulo2)
		titulo += titulo2
		titulo += '.png'
		plt.clf()
	return result, len(result), titulo

def getfastaknn(fasta):
	arqcompc = ''

	for line in str(fasta):
		arqcompc += line

	fastas = []
	cabecalho = []

	auxiliarfasta = ''
	auxiliarcabecalho = ''

	inicio = False
	fim = False

	arqcompc = arqcompc.replace('\n','')
	arqcompc = arqcompc.replace('\r','')

	auxiliarfasta = ''

	for i in range(len(arqcompc)):
		if arqcompc[i] == '>':
			inicio = not inicio
		if arqcompc[i] == ']':
			fim = not fim
			auxiliarcabecalho += arqcompc[i]
			cabecalho.append(auxiliarcabecalho)
			auxiliarcabecalho = ''
			if auxiliarfasta != '':
				fastas.append(auxiliarfasta)
			auxiliarfasta = ''
		if (inicio and fim) or (not inicio and not fim):
			if arqcompc[i] != '\n' and arqcompc[i] != ']':
				auxiliarfasta += arqcompc[i]
		else:
			auxiliarcabecalho += arqcompc[i]
	fastas.append(auxiliarfasta)

	conjuntodados = []

	for i in range(len(fastas)):
		dados = []

		arqfasta = fastas[i]
		tam = len(arqfasta)

		cterminal = arqfasta[tam-25:tam]
		nterminal = arqfasta[0:20]
		
		hidro = hidropatia(arqfasta)
		media = hidromedia(hidro)
		hidroC = hidropatia(cterminal)
		cargaC = carga(cterminal)
		polarbasico = qtdepolarbasico(cterminal)
		espiralenrolada = espiraldupla(arqfasta)
		nuclear = sln(arqfasta)
		mito = slm(nterminal)
		prenil = prenilacao(cterminal)

		dados.append(hidro)
		dados.append(media)
		dados.append(hidroC)
		dados.append(cargaC)
		dados.append(polarbasico)
		dados.append(espiralenrolada)
		dados.append(mito)
		dados.append(nuclear)
		dados.append(prenil)

		conjuntodados.append(dados)

	return conjuntodados,cabecalho

def getfastarna(fasta):
	arqcompc = ''

	for line in str(fasta):
		arqcompc += line

	fastas = []
	cabecalho = []

	auxiliarfasta = ''
	auxiliarcabecalho = ''

	inicio = False
	fim = False

	arqcompc = arqcompc.replace('\n','')
	arqcompc = arqcompc.replace('\r','')

	auxiliarfasta = ''

	for i in range(len(arqcompc)):
		if arqcompc[i] == '>':
			inicio = not inicio
		if arqcompc[i] == ']':
			fim = not fim
			auxiliarcabecalho += arqcompc[i]
			cabecalho.append(auxiliarcabecalho)
			auxiliarcabecalho = ''
			if auxiliarfasta != '':
				fastas.append(auxiliarfasta)
			auxiliarfasta = ''
		if (inicio and fim) or (not inicio and not fim):
			if arqcompc[i] != '\n' and arqcompc[i] != ']':
				auxiliarfasta += arqcompc[i]
		else:
			auxiliarcabecalho += arqcompc[i]
	fastas.append(auxiliarfasta)

	conjuntodados = []

	for i in range(len(fastas)):
		dados = []

		arqfasta = fastas[i]
		tam = len(arqfasta)

		cterminal = arqfasta[tam-25:tam]
		nterminal = arqfasta[0:20]
		
		hidro = hidropatia(arqfasta)
		media = hidromedia(hidro)
		hidroC = hidropatia(cterminal)
		cargaC = carga(cterminal)
		polarbasico = qtdepolarbasico(cterminal)
		espiralenrolada = espiraldupla(arqfasta)
		nuclear = sln(arqfasta)
		mito = slm(nterminal)

		dados.append(hidro)
		dados.append(media)
		dados.append(hidroC)
		dados.append(cargaC)
		dados.append(polarbasico)
		dados.append(espiralenrolada)
		dados.append(mito)
		dados.append(nuclear)

		conjuntodados.append(dados)

	return conjuntodados,cabecalho

def hidropatia(sequence):
	dic = {}
	dic['I'] = 4.5
	dic['V'] = 4.2
	dic['L'] = 3.8
	dic['F'] = 2.8
	dic['C'] = 2.5
	dic['M'] = 1.9
	dic['A'] = 1.8
	dic['G'] = -0.4
	dic['T'] = -0.7
	dic['S'] = -0.8
	dic['W'] = -0.9
	dic['Y'] = -1.3
	dic['P'] = -1.6
	dic['H'] = -3.2
	dic['E'] = -3.5
	dic['Q'] = -3.5
	dic['D'] = -3.5
	dic['N'] = -3.5
	dic['K'] = -3.9
	dic['R'] = -4.5
	soma = 0
	for i in range(len(sequence)):
		if sequence[i] in dic:
			soma += dic[sequence[i]]
	return soma

def carga(sequence):
	soma = 0
	for i in range(len(sequence)):
		if sequence[i] == 'H' or sequence[i] == 'R' or sequence[i] == 'K':
			soma += 1
		if sequence[i] == 'E' or sequence[i] == 'D':
			soma -= 1
	return soma 

def qtdepolarbasico(sequence):
	soma = 0
	for i in range(len(sequence)):
		if sequence[i] == 'H' or sequence[i] == 'R' or sequence[i] == 'K':
			soma += 1
	return soma

def hidromedia(num):
	return num/2

def espiraldupla(sequence):
	dic = {}
	dic['I'] = 4.5
	dic['V'] = 4.2
	dic['L'] = 3.8
	dic['F'] = 2.8
	dic['C'] = 2.5
	dic['M'] = 1.9
	dic['A'] = 1.8
	dic['G'] = -0.4
	dic['T'] = -0.7
	dic['S'] = -0.8
	dic['W'] = -0.9
	dic['Y'] = -1.3
	dic['P'] = -1.6
	dic['H'] = -3.2
	dic['E'] = -3.5
	dic['Q'] = -3.5
	dic['D'] = -3.5
	dic['N'] = -3.5
	dic['K'] = -3.9
	dic['R'] = -4.5

	inicio = 0
	fim = 7
	ocorrencia = 0
	while fim <= len(sequence):
		soma = 0
		for i in range(inicio,fim):
			posicao = i-inicio
			if sequence[i] in dic:
				valor = dic[sequence[i]]
			else:
				valor = 0
			if (posicao == 0 or posicao == 3) and valor > 0:
				soma += 1
			if (posicao == 1 or posicao == 2 or posicao == 4 or posicao == 5 or posicao == 6) and valor < 0:
				soma += 1
		if soma == 7:
			ocorrencia += 1
		inicio += 1
		fim += 1
	if ocorrencia >= 2:
		return 1
	else:
		return 0

def sln(sequence):
	x = sequence.find('PKKKRKV')
	if x != -1:
		return 1
	x = sequence.count('KR')
	if x >= 4:
		return 1
	else:
		return 0

def slm(sequence):
	espiral = espiraldupla(sequence)
	soma = 0
	acidos = 0
	for i in range(len(sequence)):
		if sequence[i] == 'R' or sequence[i] == 'L' or sequence[i] == 'S' or sequence[i] == 'A':
			soma += 1
		if sequence[i] == 'H' or sequence[i] == 'R' or sequence[i] == 'K':
			acidos += 1
	if acidos >= 2 and soma > 5:
		return 1
	else:
		return 0

def prenilacao(sequence):
	inicio = 0
	fim = 4
	resposta = 0
	while fim <= len(sequence):
		if sequence[inicio] == 'C' and (sequence[inicio+1] == 'I' or sequence[inicio+1] == 'V' or sequence[inicio+1] == 'L' or sequence[inicio+1] == 'A' or sequence[inicio+1] == 'P' or sequence[inicio+1] == 'M') and (sequence[inicio+2] == 'I' or sequence[inicio+2] == 'V' or sequence[inicio+2] == 'L' or sequence[inicio+2] == 'A' or sequence[inicio+2] == 'P' or sequence[inicio+2] == 'M') and (sequence[inicio+3] == 'A' or sequence[inicio+3] == 'M' or sequence[inicio+3] == 'S' or sequence[inicio+3] == 'L'):
			resposta = 1
		inicio += 1
		fim += 1
	return resposta

def classifica(lista):
	if lista[0] > lista[1]:
		return "Efetora"
	else:
		return "Nao efetora"

def returnoefetora(lista):
	return lista[0] * 100.0
