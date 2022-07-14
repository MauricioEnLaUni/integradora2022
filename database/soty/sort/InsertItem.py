# Returns a string formatted as "\'+YYYY-MM-DD+\'," where the values are
# generated from a random number date between the x parameters and the
# y parameters.
def rrD(x0,x1,x2,y0,y1,y2):
    from datetime import timedelta,date
    from random import randrange
    d = (date(x0,x1,x2) +
    timedelta(days=randrange((date(y0,y1,y2)-date(x0,x1,x2)).days)))
    return "\'"+str(d)+"\'"
# Returns a string in BR00X or BR0XX format, which is then used to
# reference the brand table foreign key.
def rrN(x):
    from random import randint
    a = randint(1,x)
    if a < 10:
        b = "\'BR000"+str(a)+"\'"
    else:
        b = "\'BR00"+str(a)+"\'"
    return b
    
# Returns a string with the table code plus 
def I(x):
    if(x<10):
        a = "00"+str(x)
    elif(x<100):
        a = "0"+str(x)
    else:
        a = str(x)
    return "\'IT0"+a+"\',"
    
# Returns a number between 300.00-2000.00 and its product by 1.22
# rounded to two digits. These numbers are then passed into it_in and
# it_ot 
def inO():
    from random import randint,random
    gd = randint(300,1999)+random()
    return str(round(gd,2))+","+str(round(gd*1.22,2))
# Prints to a file.
def toFile(x,y):
    from sys import stdout
    o = stdout
    f = open(x,"a")
    f.write(y)
    stdout = o
# Returns a random adjective+verb/noun which is used as a product name.
def nameMe():
    from wonderwords import RandomWord
    r = RandomWord()
    return ("\'"+r.word(include_parts_of_speech=["adjective"])+" "+
    r.word(include_parts_of_speech=["noun","verb"])+"\'")

# Returns a random int from 0 to the parameter
def RanQ(a):
    from random import randint
    return str(randint(0,a))+","
    
for i in range(1,151,1):
    # ID,NM,DS,IN,OT,BR,MT,CL,TP,WH,RD
    toFile("Item.txt",("INSERT INTO ITEM VALUES("+I(i)+nameMe()+
    ",\'\',"+inO()+","+rrN(39)+","+RanQ(342)+RanQ(999)+RanQ(12)+
    RanQ(5)+rrD(2010,1,1,2022,6,1)+");\n"))