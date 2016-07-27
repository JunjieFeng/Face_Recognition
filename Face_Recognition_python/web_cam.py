import numpy as np
import cv2
import urllib 
import time

#stream=urllib.urlopen('http://192.168.206.175//mjpg/video.mjpg')
#bytes=''
#while(True):
#	bytes+=stream.read(1024)
#	bytes+=stream.read(1024)
#	a = bytes.find('\xff\xd8')
#	b = bytes.find('\xff\xd9')
#	if a!=-1 and b!=-1:
#		jpg = bytes[a:b+2]
#		bytes= bytes[b+2:]
#		frame = cv2.imdecode(np.fromstring(jpg, dtype=np.uint8),cv2.IMREAD_COLOR)
#		cv2.imshow('frame',frame)
#        if cv2.waitKey(1) & 0xff ==27:
#            exit(0) #or break




cap = cv2.VideoCapture(0)
fgbg = cv2.createBackgroundSubtractorMOG2(detectShadows = True)
w = cap.get(3)
h = cap.get(4)

while(cap.isOpened()):
	ret, frame = cap.read()
	fgmask = fgbg.apply(frame)
	if ret:
		frame2 = frame
		cv2.imshow('Frame',fgmask)
	else:
		print "error"
		break

	line3 = np.array([[w/2,0],[w/2,h]],np.int32).reshape((-1,1,2))
	frame2 = cv2.polylines(frame2,[line3],False,(0,255,0),thickness=3)
	cv2.putText(frame, 'Testing......ESC to Exit' ,(0,int(h)-5),cv2.FONT_HERSHEY_SIMPLEX,1,(0,0,255),1,cv2.LINE_AA)
	cv2.imshow('Frame_2',frame2)
	if cv2.waitKey(30) & 0xff == 27:
		break
cap.release()
cv2.destroyAllWindows()