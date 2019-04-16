import pygame
from pygame.locals import *
from sys import exit
import random
from math import pi
import sys

pygame.init()

screen=pygame.display.set_mode((640,480),0,32)
pygame.display.set_caption("Copa do mundo Russia 2018")

nivel = 1
gols = 0

fim_jogo = False
campeao = False
menu = True
mododejogo = False
modo71 = False
niveis = False
jogar = True
classico = False

#bola
circ_sur = pygame.Surface((15,15))
circ = pygame.draw.circle(circ_sur,(255,255,255),(15/2,15/2),15/2)
circle = circ_sur.convert()
circle.set_colorkey((0,0,0))

#imagens
perdeu = pygame.image.load("perdeu.jpeg")
ganhou = pygame.image.load("campeao.jpeg")
imagem_menu = pygame.image.load("menu.png")
campo = pygame.image.load("campo.jpeg")
telapreta = pygame.image.load("telapreta.png")

#valores das barras
bar1_x, bar2_x = 10. , 620.
bar1_y, bar2_y = 215. , 215.
circle_x, circle_y = 307.5, 232.5
bar1_move, bar2_move = 0. , 0.
speed_x, speed_y, speed_circ = 250., 250., 250.
bar1_score, bar2_score = -1,0

clock = pygame.time.Clock()
font = pygame.font.SysFont("calibri",40)
fonte = pygame.font.SysFont("calibri", 30)

pygame.mixer.music.load("menu.mp3")
pygame.mixer.music.play()

while jogar:

    #menu - normal 50, pequeno 10, grande 220
    while menu:
	screen.blit(imagem_menu, (0,0))
	modelosdejogos = fonte.render("Aperte M para modos de jogo", True, (255,255,255))
	sair = fonte.render("Aperte S para sair", True, (255,255,255))
	screen.blit(modelosdejogos, (170,380))
	screen.blit(sair, (230,430))
	pygame.display.update()
	for event in pygame.event.get():
            if event.type == pygame.KEYDOWN:
                if event.key == pygame.K_m:
                    menu = False
		    mododejogo = True
		    pygame.mixer.music.stop()
		if event.key == pygame.K_s:
		    jogar = False
		    menu = False
    
    #escolha de modo de jogo
    while mododejogo:
	screen.blit(telapreta, (0,0))
	modoclassico = fonte.render("Modo classico Copa do Mundo - Ganha quem fizer 3 gols", True, (255,255,255))
	modo1 = fonte.render("1 - Extremamente Facil", True, (255,255,255))
	modo2 = fonte.render("2 - Facil", True, (255,255,255))
	modo3 = fonte.render("3 - Normal", True, (255,255,255))
	modo4 = fonte.render("4 - Dificil", True, (255,255,255))
	modo5 = fonte.render("5 - Extremamente Dificil", True, (255,255,255))
	modo7x1 = fonte.render("Modo 7x1 - Ganha quem fizer 8 gols primeiro", True, (255,255,255))
	modo7 = fonte.render("7 - 7x1", True, (255,255,255))
	sair = fonte.render("Aperte S para sair", True, (255,255,255))
	screen.blit(modoclassico, (30, 10))
	screen.blit(modo1, (210, 60))
	screen.blit(modo2, (270, 110))
	screen.blit(modo3, (260, 160))
	screen.blit(modo4, (270, 210))
	screen.blit(modo5, (210, 260))
	screen.blit(modo7x1, (100, 340))
	screen.blit(modo7, (290, 390))
	screen.blit(sair, (230, 460))
	pygame.display.update()
	for event in pygame.event.get():
		if event.type == pygame.KEYDOWN:
			if event.key == pygame.K_s:
				mododejogo = False
				jogar = False
			if event.key == pygame.K_1:
				bar = pygame.Surface((10,220))
				barra = pygame.Surface((10, 10))
				barbr = bar.convert()
				barbr.fill((255,255,0))
				barvermelho = barra.convert()
				barvermelho.fill((255,0,0))
				barpreto = barra.convert()
				barpreto.fill((0,0,0))
				barazul = barra.convert()
				barazul.fill((0,0,255))
				barbranco = barra.convert()
				barbranco.fill((255,255,255))
				barazulclaro = barra.convert()
				barazulclaro.fill((112,219,219))
				barverde = barra.convert()
				barverde.fill((0,255,0))
				tam1y, tam2y = 213.5, 3.5
				limite1y, limite2y = 245. , 450
				inicio1y, inicio2y = 130., 235.
				mododejogo = False
				classico = True
				bar1_score, bar2_score = -1,0
			if event.key == pygame.K_2:
				bar = pygame.Surface((10,220))
				barra = pygame.Surface((10, 50))
				barbr = bar.convert()
				barbr.fill((255,255,0))
				barvermelho = barra.convert()
				barvermelho.fill((255,0,0))
				barpreto = barra.convert()
				barpreto.fill((0,0,0))
				barazul = barra.convert()
				barazul.fill((0,0,255))
				barbranco = barra.convert()
				barbranco.fill((255,255,255))
				barazulclaro = barra.convert()
				barazulclaro.fill((112,219,219))
				barverde = barra.convert()
				barverde.fill((0,255,0))
				tam1y, tam2y = 213.5, 42.5
				limite1y, limite2y = 245. , 415.
				inicio1y, inicio2y = 130., 215.
				mododejogo = False
				classico = True
				bar1_score, bar2_score = -1,0
			if event.key == pygame.K_3:
				bar = pygame.Surface((10,50))
				barbr = bar.convert()
				barbr.fill((255,255,0))
				barvermelho = bar.convert()
				barvermelho.fill((255,0,0))
				barpreto = bar.convert()
				barpreto.fill((0,0,0))
				barazul = bar.convert()
				barazul.fill((0,0,255))
				barbranco = bar.convert()
				barbranco.fill((255,255,255))
				barazulclaro = bar.convert()
				barazulclaro.fill((112,219,219))
				barverde = bar.convert()
				barverde.fill((0,255,0))
				tam1y, tam2y = 42.5, 42.5
				limite1y, limite2y = 415. , 415.
				inicio1y, inicio2y = 215., 215.
				mododejogo = False
				classico = True
				bar1_score, bar2_score = -1,0
			if event.key == pygame.K_4:
				bar = pygame.Surface((10,50))
				barra = pygame.Surface((10, 220))
				barbr = bar.convert()
				barbr.fill((255,255,0))
				barvermelho = barra.convert()
				barvermelho.fill((255,0,0))
				barpreto = barra.convert()
				barpreto.fill((0,0,0))
				barazul = barra.convert()
				barazul.fill((0,0,255))
				barbranco = barra.convert()
				barbranco.fill((255,255,255))
				barazulclaro = barra.convert()
				barazulclaro.fill((112,219,219))
				barverde = barra.convert()
				barverde.fill((0,255,0))
				tam1y, tam2y = 42.5, 213.5
				limite1y, limite2y = 415. , 245.
				inicio1y, inicio2y = 215., 130.
				mododejogo = False
				classico = True
				bar1_score, bar2_score = -1,0
			if event.key == pygame.K_5:
				bar = pygame.Surface((10, 10))
				barra = pygame.Surface((10, 220))
				barbr = bar.convert()
				barbr.fill((255,255,0))
				barvermelho = barra.convert()
				barvermelho.fill((255,0,0))
				barpreto = barra.convert()
				barpreto.fill((0,0,0))
				barazul = barra.convert()
				barazul.fill((0,0,255))
				barbranco = barra.convert()
				barbranco.fill((255,255,255))
				barazulclaro = barra.convert()
				barazulclaro.fill((112,219,219))
				barverde = barra.convert()
				barverde.fill((0,255,0))
				tam1y, tam2y = 3.5, 213.5
				limite1y, limite2y = 450. , 245.
				inicio1y, inicio2y = 235., 130.
				mododejogo = False
				classico = True
				bar1_score, bar2_score = -1,0
			if event.key == pygame.K_7:
				tamanhobarra = 25
				bar = pygame.Surface((10,tamanhobarra))
				barrabrasileira = pygame.Surface((10,50))
				barbr = barrabrasileira.convert()
				barbr.fill((255,255,0))
				barpreto = bar.convert()
				barpreto.fill((0,0,0))
				tam1y, tam2y = 42.5, 17.5
				limite1y, limite2y = 415., 435.
				inicio1y, inicio2y = 215., 227.
				bar1_score, bar2_score = 0, 7
				mododejogo = False
				modo71 = True
				bar1_score, bar2_score = 0,7

    #quando perde
    while fim_jogo:
        screen.blit(perdeu,(0,0))
        continuar = font.render("Voce perdeu! Aperte C para continuar!", True, (255,255,255))
        screen.blit(continuar, (0,430))
        pygame.display.update()
        for event in pygame.event.get():
            if event.type == pygame.KEYDOWN:
                if event.key == pygame.K_c:
                    fim_jogo = False
		    menu = True
		    pygame.mixer.music.load("menu.mp3")
                    pygame.mixer.music.play()
                    nivel = 1
		    gols = 0
                    bar1_x, bar2_x = 10. , 620.
                    bar1_y, bar2_y = 215. , 215.
                    circle_x, circle_y = 307.5, 232.5
                    bar1_move, bar2_move = 0. , 0.
                    speed_x, speed_y, speed_circ = 250., 250., 250.
                    bar1_score = -1
                    bar2_score = 0


    #quando e campeao
    while campeao:
        screen.blit(ganhou,(0,0))
        continuar = font.render("Voce foi campeao! Aperte C jogar!", True, (255,255,255))
        screen.blit(continuar, (0,430))
        pygame.display.update()
        for event in pygame.event.get():
            if event.type == pygame.KEYDOWN:
                if event.key == pygame.K_c:
			gols = 0
			nivel = 1
			bar1_score, bar2_score = -1,0
			campeao = False
			menu = True
                    

    #jogo classico
    while classico:    
	    for event in pygame.event.get():
		if event.type == KEYDOWN:
		    if event.key == K_UP:
		        bar1_move = -ai_speed
		    elif event.key == K_DOWN:
		        bar1_move = ai_speed
		elif event.type == KEYUP:
		    if event.key == K_UP:
		        bar1_move = 0.
		    elif event.key == K_DOWN:
		        bar1_move = 0.
		
	    if bar1_score == 3:
		bar1_score = 0
		bar2_score = 0
		gols += 3
		nivel += 1
		if gols != 21:
			pygame.mixer.music.load("gol.mp3")
			pygame.mixer.music.play()

	    if bar2_score == 3:
		fim_jogo = True
		classico = False
		pygame.mixer.music.load("passeio.mp3")
		pygame.mixer.music.play()

	    if gols == 21:
		campeao = True
		classico = False
		
	    if bar1_score == -1:
		score1 = font.render("0", True,(255,255,255))
	    else:
		score1 = font.render(str(bar1_score), True,(255,255,255))
	    score2 = font.render(str(bar2_score), True,(255,255,255))
	    time1 = font.render("BRASIL", True, (255,255,255))
	    if nivel == 1:
		time2 = font.render("SUICA", True, (255,255,255))
		fase = font.render("FASE DE GRUPOS", True, (255,255,255))
	    if nivel == 2:
		time2 = font.render("COSTA RICA", True, (255,255,255))
		fase = font.render("FASE DE GRUPOS", True, (255,255,255))
	    if nivel == 3:
		time2 = font.render("SERVIA", True, (255,255,255))
		fase = font.render("FASE DE GRUPOS", True, (255,255,255))
	    if nivel == 4:
		time2 = font.render("MEXICO", True, (255,255,255))
		fase = font.render("OITAVAS DE FINAL", True, (255,255,255))
	    if nivel == 5:
		time2 = font.render("INGLATERRA", True, (255,255,255))
		fase = font.render("QUARTAS DE FINAL", True, (255,255,255))
	    if nivel == 6:
		time2 = font.render("ARGENTINA", True, (255,255,255))
		fase = font.render("SEMI FINAL", True, (255,255,255))
	    if nivel == 7:
		time2 = font.render("ALEMANHA", True, (255,255,255))
		fase = font.render("FINAL", True, (255,255,255))

	    screen.blit(campo,(0,0))
	    screen.blit(barbr,(bar1_x,bar1_y))
	    if nivel == 1:
		screen.blit(barvermelho,(bar2_x,bar2_y))
	    if nivel == 2 or nivel == 3:
		screen.blit(barazul,(bar2_x,bar2_y))
	    if nivel == 4:
		screen.blit(barverde,(bar2_x,bar2_y))
	    if nivel == 5:
		screen.blit(barbranco,(bar2_x,bar2_y))
	    if nivel == 6:
		screen.blit(barazulclaro,(bar2_x,bar2_y))
	    if nivel == 7:
		screen.blit(barpreto,(bar2_x,bar2_y))
	    screen.blit(circle,(circle_x,circle_y))
	    screen.blit(score1,(250.,350.))
	    screen.blit(score2,(380.,350.))
	    screen.blit(time1, (170.,400.))
	    screen.blit(time2, (380.,400.))
	    if nivel == 1 or nivel == 2 or nivel == 3 or nivel == 4:
	    	screen.blit(fase, (200., 20.))
	    if nivel == 5:
		screen.blit(fase, (180., 20.))
	    if nivel == 6:
		screen.blit(fase, (250., 20.))
	    if nivel == 7:
		screen.blit(fase, (285., 20.))
	    bar1_y += bar1_move
	    
	    #velocidade da bola
	    time_passed = clock.tick(30)
	    time_sec = time_passed / 1000.0
	    
	    circle_x += speed_x * time_sec
	    circle_y += speed_y * time_sec
	    ai_speed = speed_circ * time_sec
	    
	    #IA
	    if circle_x >= 305.:
		if not bar2_y == circle_y + 7.5:
		    if bar2_y < circle_y + 7.5:
		        bar2_y += ai_speed
		    if  bar2_y > circle_y - tam2y:
		        bar2_y -= ai_speed
		else:
		    bar2_y == circle_y + 7.5
	    
	    #barrinhas nao saem do jogo
	    if bar1_y >= limite1y: bar1_y = limite1y
	    elif bar1_y <= 20. : bar1_y = 20.
	    if bar2_y >= limite2y: bar2_y = limite2y
	    elif bar2_y <= 20.: bar2_y = 20.

	    #hitbox das barras
	    if circle_x <= bar1_x + 10.:
		if circle_y >= bar1_y - 7.5 and circle_y <= bar1_y + tam1y:
		    circle_x = 20.
		    speed_x = -speed_x
	    if circle_x >= bar2_x - 15.:
		if circle_y >= bar2_y - 7.5 and circle_y <= bar2_y + tam2y:
		    circle_x = 605.
		    speed_x = -speed_x

	    #pontuacao
	    if circle_x < 5.:
		bar2_score += 1
		circle_x, circle_y = 320., 232.5
		bar1_y,bar_2_y = inicio1y, inicio2y
	    elif circle_x > 620.:
		bar1_score += 1
		circle_x, circle_y = 307.5, 232.5
		bar1_y, bar2_y = inicio1y, inicio2y

	    #margem inferior e superior para a bola    
	    if circle_y <= 20.:
		speed_y = -speed_y
		circle_y = 20.
	    elif circle_y >= 450:
		speed_y = -speed_y
		circle_y = 450

	    pygame.display.update()

    #modo 7x1
    while modo71:
	    for event in pygame.event.get():
		if event.type == KEYDOWN:
		    if event.key == K_UP:
		        bar1_move = -ai_speed
		    elif event.key == K_DOWN:
		        bar1_move = ai_speed
		elif event.type == KEYUP:
		    if event.key == K_UP:
		        bar1_move = 0.
		    elif event.key == K_DOWN:
		        bar1_move = 0.
		
	    if bar1_score == 8:
		modo71 = False
	        campeao = True

	    if bar2_score == 8:
		fim_jogo = True
		modo71 = False
		pygame.mixer.music.load("passeio.mp3")
		pygame.mixer.music.play()
		
	    if bar1_score == -1:
		score1 = font.render("0", True,(255,255,255))
	    else:
		score1 = font.render(str(bar1_score), True,(255,255,255))
	    score2 = font.render(str(bar2_score), True,(255,255,255))
	    time1 = font.render("BRASIL", True, (255,255,255))
	    time2 = font.render("ALEMANHA", True, (255,255,255))
	    screen.blit(campo,(0,0))
	    screen.blit(barbr,(bar1_x,bar1_y))
	    screen.blit(barpreto,(bar2_x,bar2_y))
	    screen.blit(circle,(circle_x,circle_y))
	    screen.blit(score1,(250.,350.))
	    screen.blit(score2,(380.,350.))
	    screen.blit(time1, (170.,400.))
	    screen.blit(time2, (380.,400.))
	    bar1_y += bar1_move
	    
	    #velocidade da bola
	    time_passed = clock.tick(30)
	    time_sec = time_passed / 1000.0
	    
	    circle_x += speed_x * time_sec
	    circle_y += speed_y * time_sec
	    ai_speed = speed_circ * time_sec
	    
	    #IA
	    if circle_x >= 305.:
		if not bar2_y == circle_y + 7.5:
		    if bar2_y < circle_y + 7.5:
		        bar2_y += ai_speed
		    if  bar2_y > circle_y - tam2y:
		        bar2_y -= ai_speed
		else:
		    bar2_y == circle_y + 7.5
	    
	    #barrinhas nao saem do jogo
	    if bar1_y >= limite1y: bar1_y = limite1y
	    elif bar1_y <= 20. : bar1_y = 20.
	    if bar2_y >= limite2y: bar2_y = limite2y
	    elif bar2_y <= 20.: bar2_y = 20.

	    #hitbox das barras
	    if circle_x <= bar1_x + 10.:
		if circle_y >= bar1_y - 7.5 and circle_y <= bar1_y + tam1y:
		    circle_x = 20.
		    speed_x = -speed_x
	    if circle_x >= bar2_x - 15.:
		if circle_y >= bar2_y - 7.5 and circle_y <= bar2_y + tam2y:
		    circle_x = 605.
		    speed_x = -speed_x

	    #pontuacao
	    if circle_x < 5.:
		bar2_score += 1
		circle_x, circle_y = 320., 232.5
		bar1_y,bar_2_y = inicio1y, inicio2y
	    elif circle_x > 620.:
		bar1_score += 1
		limite2y = limite2y - 25.
		inicio2y = inicio2y - 25.
		tamanhobarra = tamanhobarra + 25
		barra = pygame.Surface((10, tamanhobarra))
		barpreto = barra.convert()
		barpreto.fill((0,0,0))
		tam2y = tam2y + 25.
		circle_x, circle_y = 307.5, 232.5
		bar1_y, bar2_y = inicio1y, inicio2y

	    #margem inferior e superior para a bola    
	    if circle_y <= 20.:
		speed_y = -speed_y
		circle_y = 20.
	    elif circle_y >= 450:
		speed_y = -speed_y
		circle_y = 450

	    pygame.display.update()
	
