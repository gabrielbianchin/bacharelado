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

def hidropatia(sequence):
	soma = 0
	for i in range(len(sequence)):
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
	inicio = 0
	fim = 7
	ocorrencia = 0
	while fim <= len(sequence):
		soma = 0
		for i in range(inicio,fim):
			posicao = i-inicio
			valor = dic[sequence[i]]
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

arquivo1 = open('../dados/potenciaisefetoras.txt','r')
arquivo2 = open('../dados/controlenegativo.txt','r')
entrada = open('../dados/entrada.csv','w+')
treinamento = open('../dados/treinamento.csv','w+')

arqcompc = ''

for line in arquivo1:
	arqcompc += line

fastas = []

auxiliarfasta = ''

inicio = False

fim = False

arqcompc.replace('\n','')

#print arqcompc
auxiliarfasta = ''

for i in range(len(arqcompc)):
	if arqcompc[i] == '>':
		inicio = not inicio
	if arqcompc[i] == ']':
		fim = not fim
		if auxiliarfasta != '':
			fastas.append(auxiliarfasta)
		auxiliarfasta = ''
	if (inicio and fim) or (not inicio and not fim):
		if arqcompc[i] != '\n' and arqcompc[i] != ']':
			auxiliarfasta += arqcompc[i]
fastas.append(auxiliarfasta)

for i in range(len(fastas)):
	fasta = fastas[i]
	tam = len(fasta)

	cterminal = fasta[tam-25:tam]

	nterminal = fasta[0:20]

	hidro = hidropatia(fasta)
	media = hidromedia(hidro)
	hidroC = hidropatia(cterminal)
	cargaC = carga(cterminal)
	polarbasico = qtdepolarbasico(cterminal)
	espiralenrolada = espiraldupla(fasta)
	nuclear = sln(fasta)
	mito = slm(nterminal)
	prenil = prenilacao(cterminal)
	if(i < 180):

		entrada.writelines((str(hidro) + "\t" + str(media) + "\t" + str(hidroC) + "\t" + str(cargaC) + "\t" + str(polarbasico) + "\t" + str(espiralenrolada) + "\t" + str(mito) + "\t" + str(nuclear) + "\t" + str(prenil) + "\n"))
		#entrada.writelines(str(hidro) + "\t" + str(media) + "\t" + str(hidroC) + "\t" + str(cargaC) + "\t" + str(polarbasico) + "\n")
	else:
		treinamento.writelines((str(hidro) + "\t" + str(media) + "\t" + str(hidroC) + "\t" + str(cargaC) + "\t" + str(polarbasico) + "\t" + str(espiralenrolada) + "\t" + str(mito) + "\t" + str(nuclear) + "\t" + str(prenil) + "\n"))
		#treinamento.writelines(str(hidro) + "\t" + str(media) + "\t" + str(hidroC) + "\t" + str(cargaC) + "\t" + str(polarbasico) + "\n")


arqcompc = ''

for line in arquivo2:
	arqcompc += line

fastas = []

auxiliarfasta = ''

inicio = False

fim = False

arqcompc.replace('\n','')

#print arqcompc
auxiliarfasta = ''

for i in range(len(arqcompc)):
	if arqcompc[i] == '>':
		inicio = not inicio
	if arqcompc[i] == ']':
		fim = not fim
		if auxiliarfasta != '':
			fastas.append(auxiliarfasta)
		auxiliarfasta = ''
	if (inicio and fim) or (not inicio and not fim):
		if arqcompc[i] != '\n' and arqcompc[i] != ']':
			auxiliarfasta += arqcompc[i]
fastas.append(auxiliarfasta)

for i in range(len(fastas)):
	fasta = fastas[i]
	tam = len(fasta)

	cterminal = fasta[tam-25:tam]

	nterminal = fasta[0:20]

	hidro = hidropatia(fasta)
	media = hidromedia(hidro)
	hidroC = hidropatia(cterminal)
	cargaC = carga(cterminal)
	polarbasico = qtdepolarbasico(cterminal)
	espiralenrolada = espiraldupla(fasta)
	nuclear = sln(fasta)
	mito = slm(nterminal)
	prenil = prenilacao(cterminal)

	if(i < 180):
		entrada.writelines((str(hidro) + "\t" + str(media) + "\t" + str(hidroC) + "\t" + str(cargaC) + "\t" + str(polarbasico) + "\t" + str(espiralenrolada) + "\t" + str(mito) + "\t" + str(nuclear) + "\t" + str(prenil) + "\n"))
		#entrada.writelines(str(hidro) + "\t" + str(media) + "\t" + str(hidroC) + "\t" + str(cargaC) + "\t" + str(polarbasico) + "\n")
	else:
		treinamento.writelines((str(hidro) + "\t" + str(media) + "\t" + str(hidroC) + "\t" + str(cargaC) + "\t" + str(polarbasico) + "\t" + str(espiralenrolada) + "\t" + str(mito) + "\t" + str(nuclear) + "\t" + str(prenil) + "\n"))
		#treinamento.writelines(str(hidro) + "\t" + str(media) + "\t" + str(hidroC) + "\t" + str(cargaC) + "\t" + str(polarbasico) + "\n")

entrada.close()
treinamento.close()
