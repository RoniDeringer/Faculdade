import numpy as np
import matplotlib.pyplot as plt
numero_recursao = int(input('Informe o número de interações: '))
L1 = np.array([0, 0])
L2 = np.array([2, 0])
L3 = np.array([1, np.sqrt(3)])
ponto_atual = np.array([0, 0])

def mid_point(p1,p2):
    ponto_medio = (p1 + p2) / 2
    
    return ponto_medio

i=0

def funcaoRecursiva(ponto_atual,N,i):
  i+=1
  if (N>=i):
   
    rn = np.random.randint(1, 4)
    if (rn == 1):
      ponto_atual = mid_point(ponto_atual, L1)
    if (rn == 2):
      ponto_atual = mid_point(ponto_atual, L2)
    if (rn == 3):
      ponto_atual = mid_point(ponto_atual, L3)
     
    print(i)
    plt.plot(ponto_atual[0], ponto_atual[1], '.')
    
    funcaoRecursiva(ponto_atual,N,i) 
  
  return "fim"

funcaoRecursiva(ponto_atual,numero_recursao,x)