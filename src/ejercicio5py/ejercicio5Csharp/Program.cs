using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Ejercicio5
{
    class Program
    {
        static void Main(string[] args)
        {

            int i = 1;

            long divisores = 0; //contador de divisores

            while (divisores < 1000)
            {

                long fibonumber = (long)Math.Round(Math.Pow(1.618, i) / 2.236); //formula sencilla para obtener la serie de fibonacci
                i++;
                Console.WriteLine("\n" + fibonumber);

                divisores = GetDivisors(fibonumber);
                Console.WriteLine(" / Divisores: " + divisores + "\n");
                Console.WriteLine("/////////////////////////////////");
            }


            Console.ReadLine();
        }

        public static long GetDivisors(long number)
        {
            long divisors = 0;

            long boundary = (long)Math.Sqrt(number);

            for (long i = 1; i <= boundary; i++)
            {
                if (number % i == 0)
                {
                    divisors++;
                    if (i != (number / i))
                    {
                        if (i * i != number)
                        {
                            divisors++;
                        }
                    }
                }
            }

            return divisors;
        }
    }
}
