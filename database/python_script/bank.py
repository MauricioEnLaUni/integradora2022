from random import randint


def toFile(x,y):
    from sys import stdout
    o = stdout
    f = open(x,"a")
    f.write(y)
    stdout = o
bank = ['\'BBVA\'','\'SANT\'','\'BMEX\'','\'BNOR\'','\'HSBC\'','\'SCOT\'']
for i in range(14):
    toFile("bank.txt","INSERT INTO BANK VALUES("+str(i+1)+","+
    str(randint(1,10))+","+bank[randint(0,5)]+","+
    str(randint(1000000000000000,9999999999999999))+");\n")