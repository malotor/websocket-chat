
function piece(id, x, y, color) {
	this.id = id;
	this.x = x;
	this.y = y;
	this.color = color;
	
	this.object = null;

	this.showPosition = function() {
		console.log(x +','+y);
	}
}

var board = {

	side : 400,
	cells : 10,
	pieces : [],
	piecesDrawed : [],

  init: function(containerId) {
  	
  	var contenedor = document.getElementById(containerId);
  
		this.cellWidth = this.side/this.cells;

		this.boardContainer = Raphael(contenedor);
		var image_1 = this.boardContainer.image('assets/images/map.jpg', 0, 0, 400, 400);
		this.drawBoard();
		
  },

  addPiece: function (piece) {
  	this.pieces.push(piece);
  },

  getPiece: function (id) {
    var pieceFinded;
  	this.pieces.forEach(function(piece) {
  			console.log(id);
		    if (piece.id == id ) pieceFinded = piece;
		});
		return pieceFinded;
  },

  removePiece: function(id) {
  	var board = this;
  	this.pieces.forEach(function(piece) {
		    if (piece.id == id ) piece.remove();
		});

  },

  drawPieces: function () {
  	this.clearBoard();
  	var board = this;
  	this.pieces.forEach(function(piece) {
			board.drawPiece(piece);
		});
  },

  drawPiece: function (piece) {
  	
  	xpos = (piece.x * this.cellWidth) - this.cellWidth/2;
		ypos = (piece.y * this.cellWidth) - this.cellWidth/2;

  	var circulo = this.boardContainer.circle(xpos, ypos, this.cellWidth/2 - 5);

  	this.piecesDrawed.push(circulo);

  	circulo.attr({fill: piece.color, stroke: '#ddd', 'stroke-width': 5});
  },

  clearBoard: function() {
  	var board = this;
  	this.piecesDrawed.forEach(function(piece) {
		    piece.remove();
		});

  },


 	drawLine: function (startX, startY, despX, despY) {
    var path = "M" + startX + " " + startY + " l " + despX + " " + despY;
    var line = this.boardContainer.path(path);
	},

	drawBoard: function() {

		for(var i=1;i<=this.cells;i++) {
			
			startX = 0;
			startY = i * this.cellWidth;
			despX = this.side;
			despY = 0;
			
			this.drawLine(startX, startY, despX, despY);
		}

		for(var i=1;i<=this.cells;i++) {
			
			startX = i * this.cellWidth;
			startY = 0;
			despX = 0;
			despY = this.side;
			
			this.drawLine(startX, startY, despX, despY);
		}

	},


};