# Returns a string with the table code plus 
def I(x):
    if(x<10):
        a = "00"+str(x)
    elif(x<100):
        a = "0"+str(x)
    else:
        a = str(x)
    return "\'OR0"+a+"\',"

# 
def rrN(x):
    from random import randint
    a = randint(1,x)
    if a < 10:
        b = "\'US000"+str(a)+"\'"
    elif a < 100:
        b = "\'US00"+str(a)+"\'"
    else:
        b = "\'US0"+str(a)+"\'"
    return b
# 
for i in range(1,301,1):
    # ID,UR,IN,FL,IS,PY,PD
    toFile("Orders.txt",("INSERT INTO ORDERS VALUES("+I(i)+nameMe()+
    ",\'\',"+inO()+","+rrN(39)+","+RanQ(342)+RanQ(999)+RanQ(12)+
    RanQ(5)+rrD(2010,1,1,2022,6,1)+");\n"))