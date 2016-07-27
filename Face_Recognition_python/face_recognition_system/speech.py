import pyttsx
engine = pyttsx.init()
engine.setProperty('rate',100)
command = raw_input("Enter the Text to Speak");
engine.say(command)
engine.runAndWait()

print("~TTS Success")