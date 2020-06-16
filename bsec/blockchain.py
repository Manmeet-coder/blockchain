import hashlib
import datetime
import sys

# class for the block of the block chain
class BasicBlock:
    # data part of the block
    data = None
    # linking part of the block
    next = None
    # block identifier
    blockNumber = 0
    # nonce value
    nonce = 0
    # previous block's hash code
    previous_hash = 0x0
    # time stamp of the block
    timestamp = datetime.datetime.now()

    # block creation code
    def __init__(self, data,timestamp= datetime.datetime.now()):
        self.data = data
        self.timestamp=timestamp

    def __str__(self):
        return "Block Hash: " + str(self.hash()) + "\nBlockNo: " + str(self.blockNumber) \
               + "\nBlock Data: " + str(self.data) + "\nCost of the Mining: " + str(self.nonce) \
               + "\nTime Stamp"+str(self.timestamp)+ "\nPrevious Block Hash: " + str(self.previous_hash) +"\n--------------"

    #hash computation code
    def hash(self):
        h = hashlib.sha256()
        h.update(
        str(self.data).encode('utf-8') +
        str(self.nonce).encode('utf-8') +
        str(self.timestamp).encode('utf-8') +
        str(self.previous_hash).encode('utf-8') +
        str(self.blockNumber).encode('utf-8')
        )
        #self.hashValue=h.hexdigest()
        return h.hexdigest()

# class for the block chain
class Blockchain:
    # tolerence level
    diff = 10
    # nonce limit
    maxNonce = 2**32
    # target limit
    target = 2 ** (256-diff)

    # creation of the initial block
    block = BasicBlock("Genesis")
    dummy = head = block

    # block adding code
    def add(self, block):
        # hash computation
        #cself.previous_hash = block.hash()

        block.blockNumber = self.block.blockNumber + 1
        # linking of the block
        self.block.next = block
        temp=self.block
        self.block = self.block.next
        self.block.previous_hash=temp.hash()
    # code for the minig
    def mine(self, block):
        for n in range(self.maxNonce):
            # checking the hash limit
            if int(block.hash(), 16) <= self.target:
                self.add(block)
                # print(block)
                break
            else:
                block.nonce += 1

    def validate(self):
        i=1
        current=self.head
        error=False
        if(current!=None):
            next=current.next
        while next != None:
            if(current.hash()!=next.previous_hash):
                print('Data Tempering Identified at Location '+str(i))
                error=True
                break
            current=current.next
            next=next.next
            i+=1
        if(error==False):
            print('Validation successful!')
            return ('Validation successful!')
        else:
            return('Data Tempering Identified at Location '+str(i))


    def printBlockChain(self):
        temp=self.head
        while temp != None:
            print(temp)
            temp= temp.next

    def writeResult(self,file):
        print(file[:-3])
        file1 = open(file[:-3]+".res","w")
        temp=self.head
        if temp != None:
            # skip Genesis block
            temp= temp.next
        while temp != None:
            # print(temp)
            file1.write("Data: "+temp.data+"\n\r")
            file1.write("Timestamp: "+str(temp.timestamp)+"\n\r")
            temp= temp.next
        file1.close()
    def storeBloackChain(self, file_name):
        f= open(file_name,"w+")
        temp=self.head
        temp=temp.next
        while temp != None:
            f.write(temp.data+'\n')
            f.write(str(temp.previous_hash)+'\n')
            f.write(str(temp.nonce)+'\n')
            f.write(str(temp.timestamp)+'\n')
            temp= temp.next
        f.close()

    def __str__(self):
        temp=self.head
        temp_list=[]
        while temp != None:
            temp_list.append(str(temp))
            temp= temp.next
        return ' '.join(temp_list)

    def get_last(self):
        temp=self.head
        while(temp.next!=None):
            temp=temp.next
        return temp

def loadBlockChain(file_name):
    blockchain = Blockchain()
    with open(file_name) as f:
        data=[]
        count=0
        for line in f:
            data.append(line)
            count=(count+1)%4
            if(count==0):
                block=BasicBlock(data[0].rstrip())
                block.nonce=data[2].rstrip()
                block.previous_hash=data[1].rstrip()
                block.timestamp=datetime.datetime.strptime\
                    (str(data[3]).rstrip(), '%Y-%m-%d %H:%M:%S.%f')
                blockchain.add(block)
                data=[]
    return blockchain

# this function is for the testing of the data tampering identification
def data_tempering(chain,pos):
    temp=chain.head
    i=0
    while temp != None:
        if(i==pos):
            temp.data="fake data"
        i+=1
        temp=temp.next
    return chain



'''

# code for the testing
blockchain = Blockchain()
# reading data from the file
f=open('ledger.db',"r")
for n in range(10):
    # mining of the blocks
    blockchain.mine(BasicBlock("Block " + f.readline().rstrip()))
blockchain.mine(BasicBlock("Some other data " + f.readline()))
f.close()
blockchain1=loadBlockChain('test.txt')
blockchain.printBlockChain()
blockchain.validate()
blockchain.storeBloackChain('test.txt')

blockchain1=loadBlockChain('test.txt')
blockchain1.printBlockChain()
blockchain1.validate()

data_tempering(blockchain1,7)
blockchain1.validate()

'''

def main():
    # print("main function")
    # print('Number of arguments:', len(sys.argv), 'arguments.')
    # print('Argument List:', str(sys.argv[1]))
    if(sys.argv[1]=='1'):
        blockchain = Blockchain()
        blockchain.mine(BasicBlock(' '.join(sys.argv[3:])))
        blockchain.storeBloackChain(sys.argv[2])
        print("case 1")
    else:
        print("case 2")
        blockchain1=loadBlockChain(sys.argv[2])
        blockchain1.printBlockChain()
        blockchain1.mine(BasicBlock(' '.join(sys.argv[3:])))
        blockchain1.validate()
        blockchain1.storeBloackChain(sys.argv[2])
        blockchain1.printBlockChain()
        blockchain1.writeResult(sys.argv[2])
        print(blockchain1.get_last().data)

main()
