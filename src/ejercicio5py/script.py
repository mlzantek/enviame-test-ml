from math import sqrt

def getDivisors(number):
    divisors = 0
    a = 1
    boundary = sqrt(number)

    for a in range(a,int(boundary)+1,1):
        if number % a == 0:
            divisors+=1
            if a != (number / a):
                if a * a != number:
                    divisors+=1
    return divisors

if __name__ == '__main__':
    i = 1
    # contador de divisores
    divisores = 0

    while divisores < 1000:
        #  formula sencilla para obtener la serie de fibonacci
        fibonumber = round(pow(1.618, i) / 2.236)
        i+=1
        divisores = getDivisors(fibonumber)
        print("Iteracion N: ", i)
        print("Numero fibonacci: ", fibonumber)
        print("Divisores: ", divisores)
        print("/////////////////////////////////")

    print("El primer numero de la serie de Fibonacci cuyos divisores son mas de 1000 es: ", fibonumber," que viene siendo el numero ", i ,"de la serie")
    print("El cual tiene ", divisores," Divisores")
    print("//////////////END///////////////")