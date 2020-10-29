#include <iostream>
using namespace std;
 
const int BOARD_SZ = 8;
static int tile = 1;
static int board[BOARD_SZ][BOARD_SZ] = {0};


void chess_board(int tr, int tc, int dr, int dc, int size){
	/**
	 * 功能：棋盘覆盖
	 * @param tr表示棋盘左上角行号
	 * @param tc表示棋盘左上角列号
	 * @param dr表示特殊棋盘的行号
	 * @param dc表示特殊棋盘的列号
	 * @param size = 2^k
	 * 棋盘的规格为2^k * 2^k
	 **/
	 
    if(size == 1)
        return;
 
    int t = tile++;
    int sz = size / 2;
 
    //cover top left corner
    if(dr < tr+sz && dc < tc+sz)
        chess_board(tr, tc, dr, dc, sz);
    else{
        board[tr+sz-1][tc+sz-1] = t;
        chess_board(tr, tc, tr+sz-1, tc+sz-1, sz);
    }
 
    //cover top right corner
    if(dr < tr+sz && dc >= tc+sz)
        chess_board(tr, tc+sz, dr, dc, sz);
    else{
        board[tr+sz-1][tc+sz] = t;
        chess_board(tr, tc+sz, tr+sz-1, tc+sz, sz);
    }

    //cover lower left corner
    if(dr >= tr+sz && dc < tc+sz)
        chess_board(tr+sz, tc, dr, dc, sz);
    else{
        board[tr+sz][tc+sz-1] = t;
        chess_board(tr+sz, tc, tr+sz, tc+sz-1, sz);
    }
 
    //cover lower right corner
    if(dr >= tr+sz && dc >= tc+sz)
        chess_board(tr+sz, tc+sz, dr, dc, sz);
    else{
        board[tr+sz][tc+sz] = t;                       //标记一个假设的特殊点
        chess_board(tr+sz, tc+sz, tr+sz, tc+sz, sz);   //递归该部分
    }
}
 
void print_chess_board(){
    cout.setf(ios::left);     //左对齐
    for(int i=0; i<BOARD_SZ; ++i){
        for(int j=0; j<BOARD_SZ; ++j){
            cout.width(3);
            cout<<board[i][j];
        }
        cout<<endl;
    }
}
 
int main(){
	// 测试 
    chess_board(0, 0, 3, 4, BOARD_SZ);
    print_chess_board();
    return 0;
}
