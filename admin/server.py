from flask import Flask, render_template
import optimize
app = Flask(__name__)

@app.route('/')
def index():
  return render_template('recommendation.html')

@app.route('/my-link/')
def my_link():
  print ('I got clicked!')
  optimize.run_optimizer()

  return 'Click.'

if __name__ == '__main__':
  app.run(debug=True)