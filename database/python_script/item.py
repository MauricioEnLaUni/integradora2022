from random import randint
def rrD(x0,x1,x2,y0,y1,y2):
    from datetime import timedelta,date
    from random import randrange
    d = date(x0,x1,x2) + timedelta(days=randrange((date(y0,y1,y2)-date(x0,x1,x2)).days))
    return "\'"+str(d)+"\'"
        
def rrN():
    from random import randint
    match(randint(1,8)):
        case 1:
            return "\'Adidas\'"
        case 2:
            return "\'Nike\'"
        case 3:
            return "\'Converse\'"
        case 4:
            return "\'Crocs\'"
        case 5:
            return "\'ECCO\'"
        case 6:
            return "\'Hush Puppies\'"
        case 7:
            return "\'Caterpillar\'"
        case 8:
            return "\'SAS\'"
    
def inO():
    from random import randint,random
    gd = randint(300,1999)+random()
    return str(gd)+","+str(round(gd*1.22,2))
    
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

def mat():
    from random import randint
    match(randint(1,7)):
        case 1:
            return "\'PIEL\'"
        case 2:
            return "\'CANV\'"
        case 3:
            return "\'TEXT\'"
        case 4:
            return "\'RUBR\'"
        case 5:
            return "\'SYNT\'"
        case 6:
            return "\'FOAM\'"
        case 7:
            return "\'DENM\'"
def col():
    from random import randint
    match(randint(1,10)):
        case 1:
            return "\'WHITE\'"
        case 2:
            return "\'BLACK\'"
        case 3:
            return "\'RED\'"
        case 4:
            return "\'BLUE\'"
        case 5:
            return "\'GREEN\'"
        case 6:
            return "\'YELLW\'"
        case 7:
            return "\'ORANG\'"
        case 8:
            return "\'PURPL\'"
        case 9:
            return "\'BROWN\'"
        case 10:
            return "\'GRAY\'"

def tp():
    from random import randint
    match(randint(1,8)):
        case 1:
            return "\'Bote\'"
        case 2:
            return "\'Bota\'"
        case 3:
            return "\'Clogs\'"
        case 4:
            return "\'Loafr\'"
        case 5:
            return "\'Sanda\'"
        case 6:
            return "\'Slipp\'"
        case 7:
            return "\'Atlet\'"
        case 8:
            return "\'Work\'"

def gd():
    from random import randint
    match(randint(1,6)):
        case 1:
            return "\'Niño\'"
        case 2:
            return "\'Niña\'"
        case 3:
            return "\'Infa\'"
        case 4:
            return "\'Unsx\'"
        case 5:
            return "\'Homb\'"
        case 6:
            return "\'Mujr\'"
            
for i in range(1,51,1):
    toFile("items.txt","INSERT INTO ITEM VALUES("+str(i)+","+nameMe(2)+
    ","+"\'0\',"+inO()+","+rrN()+","+mat()+","+col()+","+tp()+
    ","+gd()+","+rrD(2010,1,1,2022,6,1)+","+str(randint(1,6))+");\n")