# Offers
def toFile(x,y):
    from sys import stdout
    o = stdout
    f = open(x,"a")
    f.write(y)
    stdout = o
    
def rrD(x0,x1,x2,y0,y1,y2):
    from datetime import timedelta,date
    from random import randrange
    d = date(x0,x1,x2) + timedelta(days=randrange((date(y0,y1,y2)-date(x0,x1,x2)).days))
    return "\'"+str(d)+"\'"

def ofAm():
    from random import randint
    return "\'"+str(randint(5,30))+"\',"

lorem = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed turpis ex, aliquam tincidunt diam non, semper elementum odio. Praesent finibus tristique bibendum. Donec eget lacinia nunc, at sodales sed. "
for i in range(1,6,1):
    toFile("offers.txt","INSERT INTO OFFERS VALUES("+str(i+1)+","+
    rrD(2020,1,1,2022,8,1)+",\'2022-08-01\',"+ofAm()+"\'"+lorem+"\');\n")