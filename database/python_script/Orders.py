from random import randint

def rrD(x0,x1,x2,y0,y1,y2):
    from datetime import timedelta,date
    from random import randrange
    d1 = date(x0,x1,x2) + timedelta(days=randrange((date(y0,y1,y2)-date(x0,x1,x2)).days))
    d2 = d1 + timedelta(days=randrange((date(y0,y1,y2)-d1).days))
    return "\'"+str(d1)+"\',\'"+str(d2)+"\',"

def rU(x,y):
    from random import randint
    if(x <= y):
        a = x
    else:
        a = randint(1,10)
    return "\'"+str(a)+"\',"
    
def toFile(x,y):
    from sys import stdout
    o = stdout
    f = open(x,"a")
    f.write(y)
    stdout = o
# 
for i in range(1,16,1):
    toFile("Orders.txt",("INSERT INTO ORDERS VALUES("+str(i)+","+
    rU(i,10)+rrD(2010,1,1,2022,6,1)+"0,"+
    str(randint(350,5138)+(randint(0,99)/100))+",\'1\');\n"))