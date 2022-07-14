# Prints to a file.
def toFile(x,y):
    from sys import stdout
    o = stdout
    f = open(x,"a")
    f.write(y)
    stdout = o

# Generates the Item Foreign key by counting the main loop and adding
# "IT0XXX" accordingly
def rrN(x):
    if x < 10:
        b = "\'IT000"+str(x)+"\',"
    elif x < 100:
        b = "\'IT00"+str(x)+"\',"
    else:
        b = "\'IT0"+str(x)+"\',"
    return b
   
# Generates the Stock Primary key by counting the secondary loop and 
# adding "STXXXX" accordingly
def RRN(a):
    if a < 10:
        b = "\'ST000"+str(a)+"\',"
    elif a < 100:
        b = "\'ST00"+str(a)+"\',"
    elif a < 1000:
        b = "\'ST0"+str(a)+"\',"
    else:
        b = "\'ST"+str(a)+"\',"
    return b
    
# Returns a random int from 0 to the parameter
def RanQ(a):
    from random import randint
    return str(randint(0,a))+","

def Stock():
    from random import randint
    a = randint(0,5)
    if a != 0:
        b = randint(1,5)
        return str(a)+","+str(b)+","
    else:
        return 0
x = 0
# ID,IT,LC,SZ,ST
for i in range(1,151,1):
    a = Stock()
    for j in range(1,15,1):
        if a != 0:
            toFile("Stock.txt",("INSERT INTO STOCK VALUES("+
            RRN((15*(i-1))+j-x)+rrN(i)+a+str(j)+");\n"))
        else:
            x+=1