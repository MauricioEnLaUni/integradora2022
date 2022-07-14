from wonderwords import RandomWord

# Assigns alias to RandomWord
r = RandomWord()

def h():
    from random import randint
    match(randint(1,10)):
        case 1|2|3:
            dom = "gmail.com"
        case 4|5|6:
            dom = "hotmail.com"
        case 7|8|9:
            dom = "yahoo.com"
        case 10:
            dom = r.word(include_parts_of_speech=["noun","verb"])+".com"
    return dom
    
def I(a):
    x = a+1
    if(x<10):
        a = "00"+str(x)
    elif(x<100):
        a = "0"+str(x)
    else:
        a = str(x)
    return "\'PR"+a+"\',"

def toFile(x,y):
    from sys import stdout
    o = stdout
    f = open(x,"a")
    f.write(y)
    stdout = o

for i in range(30):
    a = h()
    name = r.word(include_parts_of_speech=["noun"])
    toFile("prov.txt","INSERT INTO PROVIDER VALUES("+I(i)+"\'"+name+"\',\'"+name+ a[-4:]+"\');\n")