from django.shortcuts import render
from ferramenta.codigo import knn, rna

def home(request):
	dados = {}
	if request.method == "POST":
		porcentagem = request.POST.get("porcentagem")
		metodo = request.POST.get("metodo")
		fasta = request.POST.get("fasta")
		try:
			fasta = str(request.FILES["arquivo"].read())
			fasta = fasta.replace("b'",'')
			fasta = fasta.replace("\n'",'')
		except:
			arquivo = ''
		if metodo == '1':
			dados['cabecalho'], dados['tam'], dados['titulo'] = knn(fasta)
		else:
			dados['cabecalho'], dados['tam'], dados['titulo'] = rna(fasta,porcentagem)
		return render(request, 'ferramenta/index.html', dados)
	else:
		dados['tam'] = 0
		return render(request, 'ferramenta/index.html', dados)

# Create your views here.
