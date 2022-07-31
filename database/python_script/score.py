# Score
from random import randint

def toFile(x,y):
    from sys import stdout
    o = stdout
    f = open(x,"a")
    f.write(y)
    stdout = o

for i in range(1,51,1):
    toFile("score.txt","INSERT INTO SCORE VALUES('',"+str(i)+",13,5);\n")