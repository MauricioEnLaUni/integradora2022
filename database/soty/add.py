from random import randint
from sys import stdout
from wonderwords import RandomWord

# Stores stdout so it can be restored later, don't really know if I have to do this.
or_stdout = stdout
# Assigns alis to RandomWord
r = RandomWord()

countries = {
    'MX' : 'Aguascalientes',
    'BE' : 'Belmopan',
    'US' : 'Houston',
    'GU' : 'Cd. de Guatemala',
    'CU' : 'La Habana',
    'CA' : 'Ottawa'
}

def I(a):
    x = a+1
    if(x<10):
        a = "00"+str(x)
    elif(x<100):
        a = "0"+str(x)
    else:
        a = str(x)
    return "\'AD0"+a+"\',"
    
def inO(x,y):
    from random import randint
    return "\'"+str(randint(x,y))+"\'"
    
def nameMe():
    from wonderwords import RandomWord
    r = RandomWord()
    return "\'"+r.word(include_parts_of_speech=["noun","verb"])+"\'"

def toFile(x,y):
    from sys import stdout
    o = stdout
    f = open(x,"a")
    f.write(y)
    stdout = o

def whose():
    from random import randint
    if(randint(0,1) == 0):
        x = randint(1,120)
        if(x<10):
            a = "00"+str(x)
        elif(x<100):
            a = "0"+str(x)
        else:
            a = str(x)
        return "\'US0"+a+"\',NULL,"
    else:
        x = randint(1,30)
        if(x<10):
            a = "00"+str(x)
        elif(x<100):
            a = "0"+str(x)
        else:
            a = str(x)

        return "NULL,\'PR0"+a+"\',"

for i in range(200):
    ct = list(countries)[0] if randint(1,10) >= 8 else list(countries)[randint(1,5)]
    cy = "\'"+countries[ct]+"\'"
    toFile("address.txt","INSERT INTO ADDRESS VALUES("+I(i)+whose()+inO(100,1500)+","+nameMe()+","+inO(100,999999)+","+nameMe()+","+cy+",\'"+ct+"\');\n")