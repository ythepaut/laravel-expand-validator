# Technical Exercise for first recruitment

You can choose between Frontend, Mobile, or Backend exercise.

This choice will influence the job you will eventually obtain in our company.

Your submission : 
- Fork this repository
- Work on your Fork
- Submit a pull request when you're done
- For [Frontend](#frontend) and [Backend](#backend) exercises, you must publish the result on a Web Server

## Frontend

Create a Connect 4 on Angular 10.x (ivy) and Angular Material 10.x framework.

### Required : 
- HTML5 (BEM syntax) + SCSS integration.
- Responsive and animation management: users must be able to play on their mobile.
- Implementation of components, services, directives related to the logic of the game.
- The use of store(s) via ngxs is also required.
- Code documentation.
  
### Bonus:
- User preferences: management of themes (dark / light mode) according to material design logic.
- Implementation of unit and / or end to end (cypress) tests.
- SVG animation(s).
- i18n / a11y friendly.
- ie11 compatibility.
  
### Rules of the game:
The goal of the game is to line up a series of 4 pawns of the same color on a grid with 6 rows and 7 columns.

Each player has 21 pawns of one color (by convention, usually yellow or red). Alternately, the two players place a pawn in the column of their choice, the pawn then slides to the lowest possible position in the said column.

The winner is the player who first achieves a consecutive alignment (horizontal, vertical or diagonal) of at least four pawns of his color. If, while all the squares of the game grid are filled, neither of the two players has made such an alignment, the game end in a tie.

### Extra information:

The use of third-party libraries / frameworks is authorised.

No AI is needed, each player plays one after the other.

## Backend

You must create a web server with a path `POST ${yourURL}/expand_validator`. 
You can choose the technologies you want. 

We will make a POST request to your API containing this kind of content **in the body** of the request.
Your API must respond in JSON to.

### Input Example

```json
{
  "a.*.y.t": "integer",
  "a.*.y.u": "integer",
  "a.*.z": "object|keys:w,o",
  "b": "array",
  "b.c": "string",
  "b.d": "object",
  "b.d.e": "integer|min:5",
  "b.d.f": "string"
}
```

This is an object that uses the same notation than Laravel Validators.

`*` represents an array, and string keys represent the properties of this object.
The Input example can be read this way :
- An object withs properties `a,b`
- The property `a` contains an array of objects which properties are `y,z` 
- The property `b` is an object (or an associative array / HashMap) with properties `c,d`


Your backend must expand it to output a structured and labelled tree like this :

## Output Example
```json
{
  "a": {
    "type": "array",
    "validators": [
      "array"
    ],
    "items": {
      "type": "object",
      "validators": [
        "object"
      ],
      "properties": {
        "y": {
          "type": "object",
          "validators": [
            "object"
          ],
          "properties": {
            "t": {
              "type": "leaf",
              "validators": [
                "integer"
              ]
            },
            "u": {
              "type": "leaf",
              "validators": [
                "integer"
              ]
            }
          }
        },
        "z": {
          "type": "object",
          "validators": [
            "object"
          ],
          "properties": {
            "w": {
              "type": "leaf",
              "validators": []
            },
            "o": {
              "type": "leaf",
              "validators": []
            }
          }
        }
      }
    }
  },
  "b": {
    "type": "object",
    "validators": [
      "object"
    ],
    "properties": {
      "c": {
        "validators": [
          "string"
        ],
        "type": "leaf"
      },
      "d": {
        "type": "object",
        "validators": [
          "object"
        ],
        "properties": {
          "e": {
            "validators": [
              "integer",
              "min:5"
            ],
            "type": "leaf"
          },
          "f": {
            "validators": [
              "string"
            ],
            "type": "leaf"
          }
        }
      }
    }
  }
}
```

## Mobile

### iTunes Store Lookup App

Create an app that lets you do simple searches using [Apple's iTunes Store API](https://affiliate.itunes.apple.com/resources/documentation/itunes-store-web-service-search-api/).

For example to obtain all the entries of the musics corresponding to U2:

https://itunes.apple.com/search?term=U2&media=music

You are free in the choice of library and display but you must return a project coded in Swift for iOS or Kotlin for Android. You are also free regarding the display of data, the layout and navigation in the app.
