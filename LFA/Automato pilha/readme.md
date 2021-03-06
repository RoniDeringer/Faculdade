# Implementação de Autômato de Pilha:
>>Automato de pilha:

     Estados:                     {q, p}
     Alfabeto de Entrada:         {a, b, &}
     Alfabeto de Pilha:           {Z, B}
     Estado inicial:              q
     Conjunto de estado finais:   (vai ser aceito quando o topo da pilha for vazio)
    
     Delta:
        δ = (q, a, Z) = (p, BBZ)
        δ = (p, b, B) = (p, &)
        δ = (p, a, Z) = (p, BBZ)
        δ = (p, &, Z) = (p, &)
        δ = (p, a, B) = (p, BBB)
    

[TEXTO SOBRE](https://panda.ime.usp.br/panda/static/pythonds_pt/03-EDBasicos/05-PilhaImplementacao.html)

[CODIGO SEMELHANTE](https://github.com/prompty001/automato-com-pilha/blob/master/a-pilha.py)

___

## FUNÇÕES USADAS:
* `array_pop` Remove o último item de um array;
* `array_merge` Junta os valores de arrays (Usado para juntar os valores dos arrays recebidos 'topo da pilha' e os novos valores recibos das pilhas(se houver));
* `str_split` Converte uma string em array, sendo cada caracter em uma posicação;
* `implode` Exibe array em apenas uma linha.

## AJUSTES:
* Funções recursivas ao invés de if's


## FALTA:
* Caso for Automato não deterministico (que pode haver alguma transição vazia), Fazer rodar mais de uma vez o foreach

## DUVIDAS:
* Deve aceitar o `b` no inico? 

*OBS meu topo da pilha é o ultimo valor do array*

___

## EXEMPLO:

>> Entrada: `ababbb`

    PASSO 1
    Estado atual:           q
    Palavra a ser lida:     a
    Topo da Pilha:          Z
    Novo estado:            p
    Empilhamento:           Z B B
    PILHA:                  [Z, B, B]
    palavra:                [b, a, b, b, b]

    PASSO 2
    Estado atual:           p
    Palavra a ser lida:     b
    Topo da Pilha:          B
    Novo estado:            p
    Empilhamento:           &
    PILHA:                  [Z, B]
    palavra:                [a, b, b, b]

    PASSO 3
    Estado atual:           p
    Palavra a ser lida:     a
    Topo da Pilha:          B
    Novo estado:            p
    Empilhamento:           B B B
    PILHA:                  [Z, B, B, B]
    palavra:                [b, b, b]

    PASSO 4
    Estado atual:           p
    Palavra a ser lida:     b
    Topo da Pilha:          B
    Novo estado:            p
    Empilhamento:           &
    PILHA:                  [Z, B, B]
    palavra:                [b, b]

    PASSO 5
    Estado atual:           p
    Palavra a ser lida:     b
    Topo da Pilha:          B
    Novo estado:            p
    Empilhamento:           &
    PILHA:                  [Z, B]
    palavra:                [b]

    PASSO 6
    Estado atual:           p
    Palavra a ser lida:     b
    Topo da Pilha:          B
    Novo estado:            p
    Empilhamento:           &
    PILHA:                  [Z]
    palavra:                []

    PASSO 7
    Estado atual:           p
    Palavra a ser lida:     
    Topo da Pilha:          Z
    Novo estado:            p
    Empilhamento:           &
    PILHA:                  []
    palavra:                []








