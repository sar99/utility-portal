from flask import Flask, render_template
import optimize
import random

app = Flask(__name__)


@app.route('/')
def index():
    return render_template('recommendation.html')


@app.route('/my-link/')
def my_link():
    print('I got clicked!')
    optimize.run_optimizer()

    return 'Click.'


@app.route('/food-wastage/')
def foodwastage():
    # print("YAAYY" + request.form.get('dish'))
    # optimize.run_optimizer()

    c = random.randrange(63, 87)
    ret = str(c) + "."
    c = random.randrange(0, 9)
    ret = ret + str(c)


if __name__ == '__main__':
    app.run(debug=True)
