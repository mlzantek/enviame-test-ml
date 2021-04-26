from math import sqrt
class memoize:
    def __init__(self, function):
        self.f = function
        self.memory = {}

    def __call__(self, *args):
        if args in self.memory:
            return self.memory[args]
        else:
            value = self.f(*args)
            self.memory[args] = value
            return value

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

@memoize
def fib(n):
  if n <= 1:
    return n
  else:
    return fib(n-1) + fib(n-2)


i = 0
# contador de divisores
divisores = 0

while divisores < 1000:
    # formula sencilla para obtener la serie de fibonacci
    fibonumber = fib(i)
    i+=1
    divisores = getDivisors(fibonumber)
    print("Iteracion N: ", i)
    print("Numero fibonacci: ", fibonumber)
    print("Divisores: ", divisores)
    print("/////////////////////////////////")

print("El primer numero de la serie de Fibonacci cuyos divisores son mas de 1000 es: ", fibonumber," que viene siendo el numero ", i ,"de la serie")
print("El cual tiene ", divisores," Divisores")
print("//////////////END///////////////")