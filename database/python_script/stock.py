# STOCK
def toFile(x,y):
    from sys import stdout
    o = stdout
    f = open(x,"a")
    f.write(y)
    stdout = o
def amount(test):
    from random import randint
    out = 0
    for x in range (0,5,1):
        if(randint(1,100) > test):
            out += 1
    if(out < 1):
        pos = 1
        out = 0
    else:
        pos = 0
    return out
    
for i in range(1,51,1):
    for j in range(60,110,5):
        match j:
            case 60:
                prob = 97
            case 65:
                prob = 95
            case 70:
                prob = 82
            case 75:
                prob = 82
            case 80:
                prob = 89
            case 85:
                prob = 89
            case 90:
                prob = 91
            case 95:
                prob = 91
            case 100:
                prob = 92
            case 105:
                prob = 93
            case 110:
                prob = 91
        a = amount(prob)
        if(a > 0):
            toFile("stock.txt","INSERT INTO STOCK VALUES(\'\',\'"+str(i)+"\',"+str(a)+",1,"+str(j / 10)+");\n")