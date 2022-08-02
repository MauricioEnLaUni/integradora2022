from random import randint
from sys import stdout
from wonderwords import RandomWord

def toFile(x,y):
    from sys import stdout
    o = stdout
    f = open(x,"a")
    f.write(y)
    stdout = o
def nameMe():
    from wonderwords import RandomWord
    r = RandomWord()
    return "\'"+r.word(include_parts_of_speech=["noun","verb"])
    
emDomain = ['hotmail.com\'','gmail.com\'','yahoo.com\'']

for i in range(12):
    if(i<10):
        a = i+1
    else:
        a = randint(1,10)

    toFile("email.txt","INSERT INTO EMAIL VALUES("+str(i+1)+","+str(a)+
    ","+    nameMe()+"@"+emDomain[randint(0,2)]+");\n")