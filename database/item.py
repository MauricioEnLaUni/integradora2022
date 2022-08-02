from random import randint
def rrD(x0,x1,x2,y0,y1,y2):
    from datetime import timedelta,date
    from random import randrange
    d = date(x0,x1,x2) + timedelta(days=randrange((date(y0,y1,y2)-date(x0,x1,x2)).days))
    return "\'"+str(d)+"\'"

def toFile(x,y):
    from sys import stdout
    o = stdout
    f = open(x,"a")
    f.write(y)
    stdout = o
    
def nameMe(x):
    from wonderwords import RandomWord
    r = RandomWord()
    if(x == 1 or x != 2):
        return "\'"+r.word(include_parts_of_speech=["noun","verb"])+"\'"
    elif(x == 2):
        return "\'"+r.word(include_parts_of_speech=["adjective"])+" "+r.word(include_parts_of_speech=["noun","verb"])+"\'"


for i in range(0,100,1):
    toFile("test.txt","INSERT INTO TEST VALUES('',"+nameMe(2)+","+rrD(2022,7,1,2022,7,31)+");\n")